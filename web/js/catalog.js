$(()=>{
    $('#catalog-pjax').on('click', '.btn-favorite', function(e){
        e.preventDefault();
        console.log($(this).data('id'));
    })
})