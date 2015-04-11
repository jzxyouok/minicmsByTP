<?php if (!defined('THINK_PATH')) exit();?><div>
	<form action="<?php echo U('Slide/add');?>" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name">图片名字(鼠标放上显示)</label> <input type="text"
				name="name" class="form-control"
				placeholder="图片名字"/>
			
			<div class="form-group">
			    <label for="exampleInputFile">上传图片</label>
			    <input type="file" id="exampleInputFile" name="photo">
			    <p class="help-block">提示提示</p>
		 	</div>
		 	
			<div class="text-center">
				<input type="submit" value="提交" class="btn btn-success">
			</div>
		</div>
	</form>
	
	<div id="drop_area" style="width:300px; height:300px; background:#aaa;">将图片拖拽到此区域</div>
	<div id="preview"></div>
</div>
<script>
$(function(){
	// 组织浏览器默认行为
	$(document).on({ 
        dragleave:function(e){    //拖离 
            e.preventDefault(); 
        }, 
        drop:function(e){  //拖后放 
            e.preventDefault(); 
        }, 
        dragenter:function(e){    //拖进 
            e.preventDefault(); 
        }, 
        dragover:function(e){    //拖来拖去 
            e.preventDefault(); 
        } 
    }); 
	var box = document.getElementById('drop_area'); //拖拽区域 
    box.addEventListener("drop",function(e){ 
        e.preventDefault(); //取消默认浏览器拖拽效果 
        var fileList = e.dataTransfer.files; //获取文件对象 
        //检测是否是拖拽文件到页面的操作 
        if(fileList.length == 0){ 
            return false; 
        } 
        //检测文件是不是图片 
        if(fileList[0].type.indexOf('image') === -1){ 
            alert("您拖的不是图片！"); 
            return false; 
        } 
        
        //拖拉图片到浏览器，可以实现预览功能 
        for (var i = 0; i < fileList.length; i++) {
	        var img = window.webkitURL.createObjectURL(fileList[i]); 
	        var filename = fileList[i].name; //图片名称 
	        var filesize = Math.floor((fileList[i].size)/1024);  
	        if(filesize>500){ 
	            alert("上传大小不能超过500K."); 
	            return false; 
	        } 
	        var str = "<img src='"+img+"'><p>图片名称："+filename+"</p><p>大小："+filesize+"KB</p>"; 
	        $("#preview").append(str); 
	         
	        //上传 
	        xhr = new XMLHttpRequest(); 
	        xhr.open("post", "<?php echo U('Slide/add');?>", true); 
	        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest"); 
	        
	        var fd = new FormData(); 
	        fd.append('photo', fileList[i]); 
	        
	        xhr.send(fd);
        }
    },false); 
});
</script>