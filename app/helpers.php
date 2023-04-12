<?php
function Active($routeName){
    return request()->routeIs($routeName) ? 'active' : ' ';
}