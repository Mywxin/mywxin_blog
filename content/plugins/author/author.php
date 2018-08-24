<?php
/*
Plugin Name: Author
Version: 20150507 v1.0
Plugin URL: http://lvwenhan.com
Description: 在每篇文章底部显示作者的头像、简介
Author: JohnLui
Author Email: wenhanlv@gmail.com
Author URL: http://lvwenhan.com
*/
!defined('EMLOG_ROOT') && exit('access deined!');

addAction('log_related', 'AuthorShow');

function AuthorGetUserById($id) {
  $User_Model = new User_Model();
  return $User_Model->getOneUser($id);
}
function AuthorShow($data) {
  $author = AuthorGetUserById($data['author']);
?>
<style>
#author{
  width: 100%;
  /*height: 270px;*/
  margin-top: 50px;
  box-shadow: 5px 5px 20px #cccccc;
}
#author h4{
  padding-top: 10px;
  margin-left: 10px;
  margin-bottom: 30px;
  font-size: 16px;
}
#avatar{
  border-radius: 80px;
  box-shadow: 5px 5px 20px #999999;
  width: 160px;
  margin-left: 80px;
  float: left;
}
#right{
  float: left;
  padding-top: 10px;
  margin-left: 70px;
  margin-bottom: 100px;
  margin-right: 100px;
}
</style>
<div id="author">
  <h4>WRITTEN BY</h4>
  <img src="<?php echo str_replace('thum-', '', $author['photo']) ?>" alt="avatar" id="avatar">
  <div id="right">
    <h3><?php blog_author($data['author']); ?></h3>
    <div id="description">
      <?php echo $author['description']; ?>
    </div>
  </div>
    <div style="clear:both;"></div>
</div>
<?php
} ?>