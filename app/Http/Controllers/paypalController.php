<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Illuminate\Http\RedirectResponse;
/**
 * Summary of paypalController
 */
class paypalController extends Controller
{
    private $apiContext;
    private $amount_pay;
        /*
     * @description: metodo costructor para trabajar con la API de PayPal 
     * @author: Aldo Armenta 29/03/2023
     * @param: ApiContext: conectar la api de paypal 
     * * 
    */
    public function __construct(){
        $paypal_config = Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypal_config['client_id'],
                $paypal_config['secret']
            )
        );
    }
        /*
     * @description: validamos los checkbox del formulario y redireccionamos a la API de paypal 
     * @author: Aldo Armenta 29/03/2023
     * @param: Request: validacion de checkbox 
     * * 
    */
    public function payment_paypal(Request $request){
    
        if(isset($_POST['check_5'])){
            $amount_pay=5;
        }else if(isset($_POST['check_10'])){
            $amount_pay=10;
        }else if(isset($_POST['check_15'])){
            $amount_pay=15;
        }else if (isset($_POST['check_any'])) {
            $request->validate([ 
                'any_amount'=>'numeric|required|min:5|max:100',
            ],
            [
                'any_amount.numeric'=>"es necesario agregar una cantidad a donar",
                'any_amount.min'=>"debe de ingresar un valor mayor a $5 USD",
                'any_amount.max'=>"😅 por su seguridad no aceptamos donaciones mayores a $100 USD 😅"
                
            ]);
            $amount_pay = $request->input('any_amount');
        }
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($amount_pay);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
            try {
                $payment->create($this->apiContext);
                return redirect()->away($payment->getApprovalLink());
            } catch (PayPalConnectionException $ex) {
                echo $ex->getData();
            }
            
    }
        /*
     * @description: se valida el status del pago y retorna una vista 
     * @author: Aldo Armenta 29/03/2023
     * @param: APIcontext: validacion de pago  
     * * 
    */
    public function paypal_status(Request $request){
        
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal-donation')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return redirect('/donacion-exitosa')->with(compact('status'));
        }

        $status = 'Lo sentimos! La donacion a través de PayPal no se pudo realizar.';
        return redirect('/paypal-donation')->with(compact('status')); 
    }
    
    public function index()
    {
        return view('paypal-success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
