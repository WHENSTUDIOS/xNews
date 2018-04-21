function clearNotifications(){
    $.ajax({
        type:'GET',
        url:'/dashboard/notifications/clear',
        data:'_token = <?php echo csrf_token(); ?>',
        success:function(data){
            console.log('Success');
        }
    });
}