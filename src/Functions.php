<?php 
/**
 *
 * (c) Wolfred Montilla <wolfrednicolas@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */ 
namespace wnmd1987\ImpossibleSoftware;
/**
 * This is a class to transform data given objects
 *
 * @author Wolfred Montilla <wolfrednicolas@gmail.com>
 */
class Functions
{
    /**
     * given the characteristics from the account, return the data as array
     *
     * @param object        $account
     * @return array
     */ 
    public function getAccount($account)
    {
        $res = [ 
            'sid'          => $account->sid,
            'friendly_name'=> $account->friendlyName,
            'status'       => $account->status,
            'date_created' => $account->dateCreated
        ];
        return $res;
    }
}