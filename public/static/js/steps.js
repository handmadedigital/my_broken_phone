$(function(){
    selectOption();
    selectCapacityOption();
    fixSelectCapacityOption();
});



function selectCapacityOption()
{
    $('.capacities-wrapper label').click(function(){

        if($(this).hasClass('full-opacity'))
        {
            $('.capacities-wrapper label').css({
                "background-position": "0 0"
            });
            $(this).css({
                "background-position": "0 -240px"
            });

        }
    });
}

function fixSelectCapacityOption()
{
    $('.fix-capacities-wrapper label').click(function(){

        if($(this).hasClass('full-opacity'))
        {
            $('.fix-capacities-wrapper label').css({
                "background-position": "0 0"
            });
            $(this).css({
                "background-position": "0 -134px"
            });

        }
    });
}

function selectOption()
{
    $('.process-wrapper img').click(function()
    {
        $('.process-wrapper img').css({
            "border-color": "#c9c8c8",
            "box-shadow": "none"
        });
        $(this).css({
            "box-shadow": "0 0 100px #97ffcd",
            "border-color": "#97ffcd"
        });
    });
}

