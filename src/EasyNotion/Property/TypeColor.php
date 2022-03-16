<?php
namespace EasyNotion\Property;

enum TypeColor: string
{
    case Default = 'default';
    case Gray = 'gray';
    case Brown = 'brown';
    case Red = 'red';
    case Orange = 'orange';
    case Yellow = 'yellow';
    case Green = 'green';
    case Blue = 'blue';
    case Purple = 'purple';
    case Pink = 'pink';

    // Background
    case GrayBg = 'gray_background';
    case BrownBg = 'brown_background';
    case RedBg = 'red_background';
    case OrangeBg = 'orange_background';
    case YellowBg = 'yellow_background';
    case GreenBg = 'green_background';
    case BlueBg = 'blue_background';
    case PurpleBg = 'purple_background';
    case PinkBg = 'pink_background';
}