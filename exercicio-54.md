Enunciado:
Estamos desenvolvendo um sistema de MDM(Gerenciamento de dispositivos móveis) e esse sistema possuirá as seguintes opções em seu menu:

Listar dispositivos
Atualizar dispositivos
Adicionar novos dispositivos
Gerenciar Aplicativos
Gerenciar um dispositivo
Associar usuário
Ativar modo perdido
Desativar modo perdido

O objetivo é construir um sistema que seja capaz de gerenciar remotamente os dispositivos de uma determinada empresa. 

Aqui está a orientação de como cada parte do menu será desenvolvida:

----------------------------------------------------------------------
Listar dispositivos
Você listara todos os dispositivos do sistema, conforme a solicitação do usuário, o usuário poderá optar por listar apenas dispositivos com o sistema operacional(OS) iOS, macOS e outros, ou poderá simplesmente listar todos os dispositivos.

Essa listagem deve ser feita utilizando a Função 1.
-----------------------------------------------------------------------
Função 1
Essa função precisa receber os seguintes parâmetros:
OS e um array chamado mdm_devices(array base no final desse arquivo).

Essa função deverá retornar um array com todas as informações dos dispositivos que atendem os parâmetros.

Aqui você terá um submenu com as opções:
Atualizar um dispositivo
Atualizar todos(para determinado OS)

Se o usuário optar por atualizar apenas um dispositivo, solicite que ele digite o S/N(serial_number) e tente fazer a atualização.

se o usuário desejar atualizar todos, solicite do usuário o OS que ele deseja realizar a atualização e tente atualizar esses dispositivos.

Regara para atualizar:
Os dispositivos deve estar conectado a uma rede(ssid_rede). 
Os dispositivos precisam ter pelo menos 50% de carga(bateria).
A VersaoOS do dispositivo precisa ser menor que a ultima versão disponível.

Para saber qual é a ultima versão disponível para esse OS, consultaremos  o um array chamado "atualizacoes" que está disponível no final desse arquivo.

Nós já teremos alguns dispositivos cadastrados em nosso sistema, eles estarão em um array chamado mdm_devices(array base no final desse arquivo).

OBS: Em caso de sucesso ou falha, uma mensagem deverá ser exibida para o usuário.
falha: Motivo da falha
Sucesso: Atualização realizada com sucesso.

Em ambos os casos será necessário mostrar os dados do dispositivo:
serial_number, modelo, versaoOS, bateria, ssid_rede.

Para listar os dispositivos utilizaremos a Função 2.
Função 2
Essa função precisa receber os seguintes parâmetros:
OS, versaoOS, operacao(menor, maior, igual, diferente) e o array chamado dispositivos(array base no final desse arquivo).

Essa função deverá retornar um array com todas as informações dos dispositivos que atendem os parâmetros.

##### Gerenciar Aplicativos

Os aplicativos dos dispositivos devem ser gerenciados individualmente, o seu objetivo é permitir que o usuário instale e remova aplicativos dos dispositivos, tanto a instalação quanto a remoção devem ser feitas utilizando o serial_number do dispositivo.

Regaras para a instalação de um app:
O Aplicativo precisa estar disponível para o OS do dispositivo.
O Aplicativo só poderá ser instalado se o dispositivo estiver com a versão mínima requerida(disponível no array aplicativos).
Sempre que instalar um aplicativo em determinado dispositivo, adicione o serial number ao array "aplicativosInstalados", o modelo desse array estará abaixo.

Regaras para remoção de um app:
O app precisa estar instalado(se não estiver, avise ao usuário).
Antes de remover, pergunte se o usuário realmente deseja desinstalar o app.
Remova o serial number do dispositivo do array "aplicativosInstalados", o modelo desse array estará abaixo.

OBS: Antes de permitir que o usuário instale um app, liste os aplicativos disponíveis e em qual OS ele pode instalar, por exemplo:

##### Gerenciar um dispositivo

Para gerenciar um dispositivo, vc precisará receber o serial number.
No gerenciamento de dispositivos vc terá as seguintes opções(e abaixo as suas regras) que só aparecerão depois que você digitar o serial number:

Adicionar remover ou alterar usuário(do dispositivo).

    Adicionar: 
Para adicionar um usuário você precisa listar os usuários disponíveis no array  $usuariosCadastrados e selecionar um desses usuários e atribui-lo ao dispositivo.

    Remover:
 Para remover um usuário exiba o nome do usuário logado no dispositivo e solicite que o usuário do sistema digite o nome do usuário que está no dispositivo, e depois pergunte se ele realmente deseja excluir.

     Alterar: 
Para alterar um usuário do dispositivo solicite que o usuário selecione ou digite um usuário que esteja presente no array $usuariosCadastrados, após ele seleccionar o novo usuário mostre a mensagem: "Substituir o usuário X pelo usuário Y, confirmar(s/n)? ", se ele confirmar, faça a alteração.

Adicionar/alterar/remover rede.

    Adicionar:
 Quando o usuário tentar adicionar uma rede, primeiro será necessário que ele selecione uma rede no array $redesEscolares, após isso ele precisa digitar a senha, e assim você irá comparar se a senha que ele digitou pertence aquela rede, se pertencer, conecte do dispositivo, se não, avise que a senha da rede está incorreta

    Alterar:
 Para alterar uma rede, solicite que o usuário selecione a rede se siga os passos de adicionar, e substitua a rede pela nova.

    Remover:
 Para remover uma rede simplesmente use o unset e remova os dados do ssid_rede so array $mdm_devices.

Formatar
 Para formatar um dispositivo solicite que o usuário do sistema digite a senha do dispositivo, essa senha está presente no array $usuariosCadastrados, se a senha estiver correta, remova as seguintes informações do array $mdm_devices: nome, ssid_rede.


$usuariosCadastrados = [
    ['nome' => 'mauro', 'senha' => '11'], 
    ['nome' => 'helio', 'senha' => '22'], 
    ['nome' => 'vinicius', 'senha' => '33'], 
    ['nome' => 'lucas', 'senha' => '44'], 
    ['nome' => 'caio', 'senha' => '55'], 
    ['nome' => 'marcelo', 'senha' => '66'],
]

 $redesEscolares = [
    ['nome' => 'campus_1', 'senha' => 'c1'], 
    ['nome' => 'campus_1_5G', 'senha' => 'c15g'], 
    ['nome' => 'estacionamento', 'senha' => 'e1'], 
    ['nome' => 'refeitorio_5G', 'senha' => 'r5g'], 
    ['nome' => 'biblioteca_2.4G', 'senha' => 'b2.4'], 
    ['nome' => 'quadra_5G', 'senha' => 'q5G'],
]

OBS: para as redes definidas anteriormente, considerem que são redes livres(que não possuem senha), e para os usuários, considerem usuários que não tem senha. 