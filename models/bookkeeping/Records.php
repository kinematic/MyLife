<?php

namespace app\models\bookkeeping;

use Yii;

/**
 * This is the model class for table "bookkeeping_records".
 *
 * @property integer $id
 * @property integer $typeid
 * @property integer $accountid
 * @property integer $catalogid
 * @property string $date
 * @property string $money
 * @property string $description
 */
class Records extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookkeeping_records';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typeid', 'accountid', 'catalogid', 'date', 'money', 'quantity'], 'required'],
            [['typeid', 'accountid', 'catalogid'], 'integer'],
            [['date'], 'safe'],
            [['money', 'quantity'], 'number'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typeid' => 'операция',
            'operation' => 'операция',
            'accountid' => 'счёт',
            'account.name' => 'счёт',
            'catalogid' => 'ценность',
            'catalog.name' => 'ценность',
            'date' => 'дата',
            'money' => 'цена, грн',
            'quantity' => 'количество',
			'total' => 'всего, грн',
            'description' => 'описание',
        ];
    }
    
    public function getOperation()
    {
        if($this->typeid == 1) return 'приход';
        elseif($this->typeid == 2) return 'расход';
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Accounts::className(), ['id' => 'accountid']);
    }
            
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalogid']);
    }
    
    public function getRecordname()
    {
        return $this->operation . ' на ' . $this->account->name . ' - ' . $this->catalog->name;
    }

    public function getTotal()
    {
        return round($this->money * $this->quantity, 0);
    }
    
    public function Balance()
    {

//         $data = DepTransaction::findOne($this->id);
// 
//         if($data->credit != 0){ 
//         $cap_bal = $cap_bal +($data->credit - $data->debit);            
//         }
// 
//         if($data->debit != 0){  
//         $int_bal = $int_bal + ($data->credit - $data->debit);  
//         }
// 
//         $total = $cap_bal+$int_bal;
        $this->balance = $this->balance + 1;
        return $this->balance;
    }
    
    public static function getTotal2($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total;
    }
}
