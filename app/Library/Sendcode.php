<?php

		//发送短信校验码
	function sendsphone($p)
	{
		//初始化必填
		//填写在开发者控制台首页上的Account Sid
		$options['accountsid']='d94fb24f5ba20494a6dc9ca88b82835a';		//填写在开发者控制台首页上的Auth Token
		$options['token']='642c2687afde583b221641bd315e850a';
		//初始化 $options必填
		$ucpass = new Ucpaas($options);
		$appid = "4696ac2ac0dc4969952d9bace207867b"; //应用的ID，可在开发者控制台内的短信产品下查看
		$templateid = "387313"; //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模
		// 板ID
		$param = rand(1000,10000); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则
		// 留空
		// $request->session('code',$param);
		//放置在cookie 60秒后过期
		// setcookie('fcode',$param,time()+1800);
		Cookie::queue('code',$param,30);
		$mobile = $p;
		$uid = "";
		//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条
		// 发送。分割后的多条短信将按照具体占用条数计费。
		return $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
	}
?>
