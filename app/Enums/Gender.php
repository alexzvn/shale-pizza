<?php

namespace App\Enums;

enum Gender: int {
    case Female = 0;
    case Male = 1;
    case NonBinary = 2;
    case Transgender = 3;
    case Intersex = 4;
    case RatherNotSay = 5;
    case Other = 6;
}
