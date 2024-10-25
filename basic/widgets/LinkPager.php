<?php

echo LinkPager::widget([
    'pagination' => $pagination,
    'maxButtonCount' => 7,
    'firstPageLabel' => 'Начало',
    'lastPageLabel' => 'Конец',
]);

?>