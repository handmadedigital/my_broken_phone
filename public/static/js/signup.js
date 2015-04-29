$(function()
{
    showStepTwo();
    showStepOne();
    goBack();

    $( "input" ).focus(function() {
        $(this).removeClass('alert');
    });

    $( "#registerEmailInput" ).focus(function() {
        $(this).val('');
    });
});

function showStepOne()
{
    $('#backRegister').click(function(e)
    {
        e.preventDefault();

        $ ('.register-step-2').fadeOut(function()
        {
            $ ('.register-step-1').fadeIn("slow");
        });
    });
}


function showStepTwo()
{
    $('#continueRegister').click(function(e)
    {
        e.preventDefault();

        var username = $('#registerUsernameInput').val();
        var email = $('#registerEmailInput').val();
        var password = $('#registerPasswordInput').val();
        var name = $('#registerNameInput').val();

        if(username == '')
        {
            $('#registerUsernameInput').addClass('alert').attr("placeholder", "Please fill me out");
            return false;
        }
        else if(email == '')
        {
            $('#registerEmailInput').addClass('alert').attr("placeholder", "Please fill me out");
            return false;
        }
        else if( ! validateEmail(email))
        {
            $('#registerEmailInput').addClass('alert').val("Please provide a valid email address");
            return false;
        }
        else if(name == '')
        {
            $('#registerNameInput').addClass('alert').attr("placeholder", "Please fill me out");
            return false;
        }
        else if(password == '')
        {
            $('#registerPasswordInput').addClass('alert').attr("placeholder", "Please fill me out");
            return false;

        }
        else
        {
            $ ('.register-step-1').fadeOut(function()
            {
                $ ('.register-step-2').fadeIn("slow");
            });
        }
    });
}

function goBack()
{
    $('#stepsGoBack').click(function(e)
    {
        e.preventDefault();
        window.history.back();
    });

}

function submitStep()
{
    $('form').submit();
}

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}