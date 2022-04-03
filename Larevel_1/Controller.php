    /***
     * 定义返回值
     * @param $code
     * @return int
     */
    protected function setReturn($code)
    {
        if($code==0)
            $message = '成功';
        if($code==1)
            $message = '操作失败';
        if($code==2)
            $message = '参数缺失';
        if($code==3)
            $message = '该邮箱所申请的账户已存在';
        if($code==4)
            $message = '账户不存在';
        if($code==5)
            $message = '密码错误';
        if($code==6)
            $message = '该昵称已被占用';
        echo json_encode(array("code"=>$code,"message"=>$message));
        return 0;
    }
    /***
     * 注册
     * @param Request $request
     * @return null
     */

    public function register(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];
        $email = $request['email'];
        $users = DB::select('select * from user_information where username= ?',[$username]);
        $users1 = DB::select('select * from user_information where email = ?',[$email]);
        if($users){
            return $this->setReturn(6);
        }
        elseif ($users1){
            return $this->setReturn(3);
        }
        else
        {
            $users = DB::insert('insert into user_information(username, email, password) VALUES (?,?,?)',[$username,$email,$password]);
            if($users){
                return $this->setReturn(0);
            }
            else{
                return $this->setReturn(1);
            }
        }
        
//        Target class [http\Env\Request] does not exist. in file /var/www/html/vendor/laravel/framework/src/Illuminate/Container/Container.php
    }

    /***
     * 登录
     * @param Request $request
     * @return int
     */
    public function login(Request $request): int
    {
        $username = $request['username'];
        $password = $request['password'];
        $email = $request['email'];

        $res = DB::table('user_information')->where('username',[$username])->get();
        $res2 = DB::table('user_information')->where('email',[$email])->get();
        if ($res||$res2)
        {
            $if_email = DB::select('select * from user_information where email=? AND password = ?',[$email,$password]);
            $if_user = DB::select('select * from user_information where username = ? AND password = ?',[$username,$password]);
            if ($if_user||$if_email)
                return $this->setReturn(0);
            else
                return $this->setReturn(5);
        }
        else
            return $this->setReturn(4);
    }

}
