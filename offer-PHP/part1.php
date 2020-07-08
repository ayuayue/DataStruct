<?php
function isShopOpen($day): bool
{
    if (!empty($day) && is_string($day)) {
        switch (strtolower($day)) {
            case 'friday':
                return true;
            case 'saturday':
                return true;
            case 'sunday':
                return true;
        }
    }
    return false;
}