<?php

namespace entity;
interface ProductInterface
{
    public function discount($percentage);
    public function order($quantity);
}