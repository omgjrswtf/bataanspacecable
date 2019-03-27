<?php $str = 'In My Cart : asd11asd';
preg_match_all('!\d+!', $str, $matches);
print_r($matches); ?>