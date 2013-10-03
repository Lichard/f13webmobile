<!DOCTYPE html>
<html>
    <head>
        <title>Richard HW4</title>
        <meta charset='utf-8'/>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel='stylesheet' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css'>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <title>Richard Li's Homepage</title>
    </head>
    <body>
<div>
        <p> Use hw3 to add comments and update profiles. </p>
        <a href="http://plato.cs.virginia.edu/~yl4tc/hw3">HW3 page</a>
</div>
        <div style="float:left; margin:15px">
        <form id='viewAllCommentsForm'>
            <button type='submit' id='viewAllCommentsButton'>View All Comments</button>
        </form>
</div>
        <div style="float:left; margin:15px">
        <form id='viewUserCommentsForm'>
            <label for='commentUser'>User: </label>
            <input name='commentUser' id="commentUser" type="text"><br>
            <button type='submit' id='viewUserCommentsButton'>View User Comments</button>
        </form>
        </div>
        <div style="float:left; margin:15px">
        <form id='viewAllUsersForm'>
            <button type='submit' id='viewAllUsersButton'>View All Users</button>
        </form>
        </div>
        <div style="float:left; margin:15px">
        <form id='viewUserInfoForm'>
            <label for='infoUser'>Name: </label>
            <input name='infoUser' id="infoUser" type="text"><br>
            <button type='submit' id='viewUserInfoButton'>View User Info</button>
        </form>
        </div>

<script>
window.onload = function(){
    $('button').button();
}
$('header').click(function(){
    $('header').effect("pulsate", "fast");
});
$('#commentForm').submit(function(e){
    e.preventDefault();
    $.ajax({
        type:"GET",
            url:"http://plato.cs.virginia.edu/~yl4tc/hw3/hw3.php",
            data:"type=commentForm&" + $('#commentForm').serialize(),
    }).done(function(msg){
        $('#result').html(msg);
    });
});
$('#userForm').submit(function(e){
    e.preventDefault();
    $.ajax({
        type:"GET",
            url:"hw3.php",
            data:"type=userForm&" + $('#userForm').serialize(),
    }).done(function(msg){
        $('#result').html(msg);
    });
});
$('#viewAllCommentsForm').submit(function(e){
    e.preventDefault();
    var url = "http://plato.cs.virginia.edu/~yl4tc/hw4/comments";
    window.open(url);
});
$('#viewAllUsersForm').submit(function(e){
    e.preventDefault();
    var url = "http://plato.cs.virginia.edu/~yl4tc/hw4/users";
    window.open(url);
});
</script>
    </body>
</html>
