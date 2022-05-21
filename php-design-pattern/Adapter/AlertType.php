<?php

namespace Adapter;

enum AlertType: int
{
    case EMAIL = 1;
    case SLACK = 2;
    case ALL = 3;
}
