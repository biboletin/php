<?php

/**
 * Интерфейс, наследяван от класовете за връзка с базата данни
 *
 *
 * @author BK
 */
interface SQLQuery
{
/**
 * Метод за обработване на SQL заявки
 * @param string $sql SQL заявка
 */
    public function sqlQuery($sql);
}
