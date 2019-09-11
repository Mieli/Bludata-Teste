
$( function() {

    var hoje = new Date();

    var dtNascimento = $('#idade').html();

    var split = dtNascimento.split('/');
    var novadata = split[1] + "/" +split[0]+"/"+split[2];
    var dataNascimento = new Date(novadata);

    //pegar a idade em anos
    var idade = hoje.getFullYear() - dataNascimento.getFullYear();

    //pegar a subtração do mes de nascimento
    var mes = hoje.getMonth() - dataNascimento.getMonth();

    if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    if(idade == 1){
        $('#idade').html(idade + ' Ano');
    }else{
        $('#idade').html(idade + ' Anos');
    }
    
});
