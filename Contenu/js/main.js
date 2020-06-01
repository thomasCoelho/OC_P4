var divAddComment = document.getElementById('div-add-comment');
var buttonAddComment = document.getElementById('button-add-comment');
var divComment = document.querySelector('.div-comment');
var editComment = document.querySelector('.comment-edit');
var divDeleteComment = document.querySelector('.div-delete-comment');
var buttonDeleteComment = document.querySelector('.no-delete-comment');

buttonAddComment.addEventListener('click', function(){
	divAddComment.style.display = "block";
	buttonAddComment.style.display = "none";
})

editComment.addEventListener('click', function(){
	divDeleteComment.style.display = "block";
	divComment.style.height = '30vh';
})

buttonDeleteComment.addEventListener('click', function(){
	divDeleteComment.style.display = "none";
	divComment.style.height = 'auto';
})
