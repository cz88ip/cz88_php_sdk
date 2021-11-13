# 纯真网络 IP查询接口 官方PHP SDK

## 使用方法

### 请到 [阿里云云市场](https://market.aliyun.com/products/57002002/cmapi00046276.html) 购买地址库API套餐，在 [后台](https://market.console.aliyun.com/imageconsole/index.htm?productName=%E7%BA%AF%E7%9C%9FIP%E5%9C%B0%E5%9D%80%E5%BA%93API) 获取AppCode

### 安装composer库
```shell
composer require cz88/cz88_php_sdk
```
### 安装composer库
```php
// 这里传入你的AppCode
$client = new \Cz88\IpSDK\CzClient('bfda20b54da6479cb76a5dxxxx');
$arr1 = $client->query('114.114.114.114');
$arr2 = $client->query('114.114.115.115');
var_dump($arr1);
var_dump($arr2);
```

### 可运行的代码参考`demo.php`，使用前先在命令行中执行`composer install`


## 联系方式

- 客服QQ：1304576572
- QQ群：482139657
- PHP支持：进群后获取
- 购买地址：https://market.aliyun.com/products/57002002/cmapi00046276.html