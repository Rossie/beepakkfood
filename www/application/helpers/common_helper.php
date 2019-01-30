<?php

function getPropVal($object, $property, $default = '') {
    if (is_object($object)) {
        return $object ? $object->$property : $default;
    }
    elseif (is_array($object)) {
        return isset($object[$property]) ? $object[$property] : $default;
    }
    else {
        return $default;
    }

}