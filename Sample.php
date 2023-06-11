<?php
require_once 'vendor/autoload.php';

use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Aiart\V20221229\AiartClient;
use TencentCloud\Aiart\V20221229\Models\TextToImageRequest;

// 替换为自己的SecretId和SecretKey
$secretId = "Your SecretId";
$secretKey = "Your SecretKey";

try {
    // 实例化一个认证对象
    $cred = new Credential($secretId, $secretKey);

    // 实例化一个http选项
    $httpProfile = new HttpProfile();
    $httpProfile->setEndpoint("aiart.tencentcloudapi.com");

    // 实例化一个client选项
    $clientProfile = new ClientProfile();
    $clientProfile->setHttpProfile($httpProfile);

    // 实例化要请求产品的client对象
    $client = new AiartClient($cred, "ap-shanghai", $clientProfile);

    // 实例化一个请求对象
    $req = new TextToImageRequest();

    // 设置请求参数
    $params = array(
        "Prompt" => $_GET['prompt'],
        "Styles" => array($_GET['styles']),
        "NegativePrompt" => $_GET['negativeprompt'],
        "LogoAdd" => intval($_GET['logoadd'])
    );
    $req->fromJsonString(json_encode($params));

    // 发送请求并获取响应
    $resp = $client->TextToImage($req);

    // 输出响应结果
    header('Content-Type: image/jpeg');
    echo base64_decode($resp->ResultImage);
} catch (TencentCloudSDKException $e) {
    // 输出错误信息
    $errorCode = $e->getErrorCode();
    $errorMessage = $e->getMessage();
    switch ($errorCode) {
        case 'AuthFailure.UnauthorizedOperation':
            echo '无权执行该操作，请检查您的CAM策略，确保您拥有对应的CAM权限。';
            break;
        case 'FailedOperation.ConsoleServerError':
            echo '控制台服务异常。';
            break;
        case 'FailedOperation.GenerateImageFailed':
            echo '生成图片审核不通过，请重试。';
            break;
        case 'FailedOperation.ImageDecodeFailed':
            echo '图片解码失败。';
            break;
        case 'FailedOperation.ImageDownloadError':
            echo '图片下载错误。';
            break;
        case 'FailedOperation.RequestEntityTooLarge':
            echo '整个请求体太大（通常主要是图片）。';
            break;
        case 'FailedOperation.RequestTimeout':
            echo '后端服务超时。';
            break;
        case 'FailedOperation.RpcFail':
            echo 'RPC请求失败，一般为算法微服务故障。';
            break;
        case 'FailedOperation.ServerError':
            echo '服务内部错误。';
            break;
        case 'FailedOperation.Unknown':
            echo '未知错误。';
            break;
        case 'InvalidParameter.InvalidParameter':
            echo '参数不合法。';
            break;
        case 'InvalidParameterValue.ImageEmpty':
            echo '图片为空。';
            break;
        case 'InvalidParameterValue.ParameterValueError':
            echo '参数字段或者值有误。';
            break;
        case 'InvalidParameterValue.TextLengthExceed':
            echo '输入文本过长，请更换短一点的文本后重试。';
            break;
        case 'InvalidParameterValue.UrlIllegal':
            echo 'URL格式不合法。';
            break;
        case 'OperationDenied.ImageIllegalDetected':
            echo '图片包含违法违规信息，审核不通过。';
            break;
        case 'OperationDenied.TextIllegalDetected':
            echo '文本包含违法违规信息，审核不通过。';
            break;
        case 'RequestLimitExceeded':
            echo '请求的次数超过了频率限制。';
            break;
        case 'ResourceUnavailable.InArrears':
            echo '帐号已欠费。';
            break;
        case 'ResourceUnavailable.LowBalance':
            echo '余额不足。';
            break;
        case 'ResourceUnavailable.NotExist':
            echo '计费状态未知，请确认是否已在控制台开通服务。';
            break;
        case 'ResourceUnavailable.StopUsing':
            echo '帐号已停服。';
            break;
        case 'ResourcesSoldOut.ChargeStatusException':
            echo '计费状态异常。';
            break;
        default:
            echo $errorMessage;
            break;
    }
}

