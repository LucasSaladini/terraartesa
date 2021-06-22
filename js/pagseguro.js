var Root = "http://"+document.location.hostname+"/terra_artesa/";
var Amount = 500.00;

//Start payment session
function startSession() {
    $.ajax({
        url: Root+"controllers/controllerId.php",
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            PagSeguroDirectPayment.setSessionId(data.id);
        },
        complete: function() {
            listPaymentMethods();
        }
    });
}

//List payment methods of PagSeguro
function listPaymentMethods() {
    PagSeguroDirectPayment.getPaymentMethods({
        amount: Amount,
        success: function(data) {
            // Returns available payment methods.
            $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj) {
                $('.credit-card').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.MEDIUM.path+" />"+obj.name+"</div>");
            });

            $('.boleto').append("<div><img src=https://stc.pagseguro.uol.com.br/"+data.paymentMethods.BOLETO.options.BOLETO.images.MEDIUM.path+">"+data.paymentMethods.BOLETO.name+"</div>");

            $.each(data.paymentMethods.ONLINE_DEBIT.options, function(i, obj) {
                $('.debit').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.MEDIUM.path+">"+obj.name+"</div>");
            });
        }
    });
}

// Get card Brand
$('#cardNumber').on('keyup', function() {
    var cardNumber = $(this).val();
    var charQuantity = cardNumber.length;

    if(charQuantity == 6) {
        PagSeguroDirectPayment.getBrand({
            cardBin: cardNumber,
            success: function(response) {
                var brandImg = response.brand.name;
                $('#cardBrand').val(brandImg);
                console.log(brandImg);
                $('.cardBrand').html("<img src=https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/"+brandImg+".png />");
                getInstallments(brandImg);
            },
            error: function(response) {
                alert('Cartão não reconhecido');
                $('.cardBrand').empty();
            }
        });
    }
});

//Shows quantity and value of installments
function getInstallments(Brand) {
    PagSeguroDirectPayment.getInstallments({
        amount: Amount,
        maxInstallmentNoInterest: 2,
        brand: Brand,
        success: function(response){
            $.each(response.installments, function(i,obj) {
                $.each(obj, function(i2,obj2) {
                    var NumberValue = obj2.installmentAmount;
                    var Number = "R$ "+NumberValue.toFixed(2).replace(".",",");
                    var NumberInstallments = NumberValue.toFixed(2);
                    $('#installmentQuantity').show().append("<option value='"+NumberInstallments+"'>"+obj2.quantity+" parcela(s) de "+Number+"</option>");
                });
            });
        }
    });
}

//Get installment value
$('#installmentQuantity').on('change',function() {
    var valueSelected = document.getElementById('installmentQuantity');
    $('#installmentValue').val(valueSelected.options[valueSelected.selectedIndex].value); 
});

//Get token card
$('#cvv').on('blur', function() {
    getCardToken();
})

//Get card token
function getCardToken() {
    PagSeguroDirectPayment.createCardToken({
        cardNumber: $('#cardNumber').val(), //4111111111111111
        brand: $('#cardBrand').val(), //visa
        cvv: $('#cvv').val(), //013
        expirationMonth: $('#month').val(),//12
        expirationYear: $('#year').val(),//2026
        success: function(response) {
            $('#cardToken').val(response.card.token);
        }
    });
}

$('#btn-Buy').on('click', function(event) {
    event.preventDefault();
    PagSeguroDirectPayment.onSenderHashReady(function(response) {
        $('#cardHash').val(response.senderHash);
    });
});
startSession();