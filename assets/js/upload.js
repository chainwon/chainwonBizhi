function uploadHide() {
  $('.upload-input').animate({
    opacity: '0',
    height: '0px',
  }, 0);
}

function PreviewImage(imgFile) {
  var filextension = imgFile.value.substring(imgFile.value.lastIndexOf("."), imgFile.value.length);
  filextension = filextension.toLowerCase();
  if ((filextension != '.jpg') && (filextension != '.jpeg') && (filextension != '.png')) {
    swal("", "对不起，仅可上传.jpg或.jpeg或.png格式的图片 !", "error");
    imgFile.focus();
  } else {
    var path;
    if (document.all) {
      imgFile.select();
      path = document.selection.createRange().text;
      document.getElementById("imgPreview").innerHTML = "";
      document.getElementById("imgPreview").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";
      uploadHide();
      return;
    } else {
      path = window.URL.createObjectURL(imgFile.files[0]);
      document.getElementById("imgPreview").innerHTML = "<img id='eee' width='100%' src='" + path + "'><input type='text' placeholder='该壁纸来源于什么动画？' name='up-source' id='up-source' value=''><input type='text' placeholder='该壁纸的作者是？' name='up-author' id='up-author' value=''><input type='text' placeholder='景物或人物' name='up-type' id='up-type' value=''><input type='text' placeholder='添加标签，按回车键完成输入' name='up-label' id='up-label' value=''><textarea type='text' placeholder='壁纸的简介' name='up-introduce' id='up-introduce' value='' style='height:100px;'></textarea><button class='uploadok' name='uploadok'><i class='fa fa-check'></i></button>";
      uploadHide();
      return;
    }
  }
}
function Checkform(){
  var us = document.getElementById("up-source").value;
  var ua = document.getElementById("up-author").value;
  var ut = document.getElementById("up-author").value;
  var ul = document.getElementById("up-label").value;
  var ui = document.getElementById("up-introduce").value;
	if(us=="" || ua=="" || ut=="" || ul=="" || ui==""){
    swal("", "不可有留空项！", "error");
		return false;
	}
	else{
		return true;
	}
}
