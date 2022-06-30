<?php

use App\Helpers\Components;

function galleryComponent()
{
    return call_user_func_array([new Components, 'galleries'], func_get_args());
}

function prev_next_buttonsComponent()
{
    return call_user_func_array([new Components, 'prev_next_buttons'], func_get_args());
}
