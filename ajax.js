//obj是一个对象，对象包含一下属性
/*

{
	method:请求方式
	url：请求地址
	async：同步或者异步
	data:{'username=goudan'}
	success:成功之后要执行的方法
}
{
	method:'get',
	url:'goudan.php',
	async:true,
	data:{pwd:888,name:'呵呵'},
	success:success
}
*/
function ajax(obj)
{
	
	//创建ajax对象
	var xhr = new XMLHttpRequest();
	// console.log(xhr);
	//处理url。为了防止缓存，让他随机一下
	obj.url += '?rand=' + Math.random();
	//绑定函数的处理
	xhr.onreadystatechange = function (){
		// console.log(xhr.readyState);
		if (xhr.readyState == 4) {
			// console.log(xhr.status);
			if (xhr.status == 200){
				// console.log(xhr.responseText);
				obj.success(xhr.responseText);
			}
		}
	};
	//处理参数
	var parems = [];
	// //{name:'goudan'}
	for (var name in obj.data)
	{
		//这个地方需要处理一下，将特殊的字符串处理一下
		var key = encodeURIComponent(name);
		var value = encodeURIComponent(obj.data[name]);
		parems.push(key + '=' + value);
	}
		obj.data = parems.join('&');

		//判断是否是get或者post
		if(obj.method == 'get'){
			obj.url +='&'+obj.data;
			// console.log(obj.url);
		}
		xhr.open(obj.method,obj.url,obj.async);
		if(obj.method =='get'){
			xhr.send();
		}else{
			xhr.setRequestHeader('content-type','applicatiob/x-www-form-urlencoded');
			xhr.send(obj.data);
		}
	
}
