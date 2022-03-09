<?php

namespace EasyNotion\Property;

enum TypeFunction: string
{
    case CountAll = 'count_all';
    case CountValues = 'count_values';
    case CountUniqueValues = 'count_unique_values';
    case CountEmpty = 'count_empty';
    case CountNotEmpty = 'count_not_empty';
    case PercentEmpty = 'percent_empty';
    case PercentNotEmpty = 'percent_not_empty';
    case Sum = 'sum';
    case Average = 'average';
    case Median = 'median';
    case Min = 'min';
    case Max = 'max';
    case Rang = 'range';
    case ShowOriginal = 'show_original';
}