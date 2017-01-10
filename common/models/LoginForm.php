<?php
namespace common\models;

use Yii;
use yii\base\Model;
use backend\models\Log;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
    //登录记录
    public function loginLog(){
        $userIP = Yii::$app->request->userIP;
        $data = $this->getIPLoc_sina($userIP);

        //$data = '';
        Yii::$app->db->createCommand()->insert(
            'log', [
            'username' => $this->username,
            'create_time' => time(),
            'ip'=>$userIP,
            'data'=>$data,
        ])->execute();
    }

    /*
    *根据新浪IP查询接口获取IP所在地
    */
    function getIPLoc_sina($queryIP){
        $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$queryIP;
        $ch = curl_init($url);
        //curl_setopt($ch,CURLOPT_ENCODING ,'utf8');
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        $location = curl_exec($ch);
        $location = json_decode($location);
        curl_close($ch);
        $loc = "";
        if($location===FALSE) return "";
        if($location < 0) return "";
        if (empty($location->desc)) {
            $loc = $location->province.'-'.$location->city.'-'.$location->district.'-'.$location->isp;
        }else{
            $loc = $location->desc;
        }
        return $loc;
    }

}
