###### 发布校园卡填入


-   请求方式：POST
    
-   URL :[http://127.0.0.1/insert.php](http://127.0.0.1/insert.php)
-   请求参数

| 参数名       | 参数类型 | 参数解释                       | 是否必填 |
| ------------ | -------- | ------------------------------ | -------- |
| number       | string   | 校园卡学号                     | 是       |
| name         | string   | 校园卡上的学生姓名             | 否       |
| qq           | string   | 拾卡人QQ                       | 是       |
| phone_number | string   | 拾卡人手机号                   | 否       |
| picture      | string   | 上传图片的url                  | 否       |
| remarks      | string   | 备注文字                       | 否       |
| stu_number   | string   | 拾卡人学号，用以定位其拾到的卡 | 是         |

- 返回参数

| 参数名  | 参数类型 | 参数解释               |
| ------- | -------- | ---------------------- |
| code    | int      | 状态码 "0"成功,"1"失败 |
| message | string   | 状态信息               |

- 返回实例
```json
{
	"code":"0",
	"message":"填入成功",
}
```
