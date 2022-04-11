<?php

namespace App\Enums;

enum Gender: int {
    const Female = 0;
    const Male = 1;
    const NonBinary = 2;
    const Transgender = 3;
    const Intersex = 4;
    const RatherNotSay = 5;
    const Other = 6;
}
