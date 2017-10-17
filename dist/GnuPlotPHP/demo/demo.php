<?php

include ('../GnuPlot.php');

use Gregwar\GnuPlot\GnuPlot;

$plot = new GnuPlot;

$plot->setXLabel('X');
    $plot->setYRange(0, 20);
    $plot->setYLabel('Y');
    $plot->push(0, 1);
    $plot->push(1, 10);
    $plot->push(2, 3);
    $plot->addLabel(2, 3, 'This is a good point');
    $plot->push(3, 2.6);
    $plot->push(4, 5.3);
    $plot->setTitle(0, 'The curve');
    $plot->display();

sleep(1000);
