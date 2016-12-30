<?php
require_once __DIR__ .'/../bootstrap.php';

use Code\Sistema\Service\ClienteService;
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;

use Symfony\Component\HttpFoundation\Request;

$app['clienteService'] = function() use ($em) {
    
    $clienteEntity = new Code\Sistema\Entity\Cliente();
    $clienteMapper = new Code\Sistema\Mapper\ClienteMapper($em);
    $clienteService = new Code\Sistema\Service\ClienteService($clienteEntity, $clienteMapper);
    return $clienteService;
};

// GET     /api/clientes/3 - Lista apenas um cliente passando o ID por parametro
// POST    /api/clientes - Insere nova cliente
// PUT     /api/clientes/2
// DELETE  /api/clientes/2

$app->get("/api/clientes", function() use ($app) {
    $dados = $app['clienteService']->fetchAll();
    return $app->json($dados);
});

$app->get("/api/clientes{id}", function($id) use ($app) {
    $dados = $app['clienteService']->find($id);
    return $app->json($dados);
});

$app->post("/api/clientes", function(Request $request) use ($app) {
    
    $dados['nome'] = $request->get('nome');
    $dados['email'] = $request->get('email');

    $result = $app['clienteService']->insert($dados);

    return $app->json($result);

});



















































$app->get('/ola/{nome}',function($nome) use ($app, $em) {

   $post = new \SON\Entity\Post;
   $post->setTitulo('Ola Mundo');
   $post->setConteudo("Conteudo do post");
   
   $em->persist($post);
   $em->flush();
       
   return $app['twig']->render('ola.twig',array('nome'=>$nome));
})
    ->bind('ola');

$app->get('/link/{nome}',function($nome) use ($app) {

    return $app['twig']->render('link.twig',array('nome'=>$nome));
})
    ->bind('link');

$app->run();


//$app->post('/cadastrar',function(Silex\Application $app, Request $request) use($em) {
//   $data = $request->request->all();
//
//    $post = new \SON\Entity\Post;
//    $post->setTitulo($data['titulo']);
//    $post->setConteudo($data['conteudo']);
//
//    $em->persist($post);
//    $em->flush();
//
//    if($post->getId()) {
//        return $app->redirect($app['url_generator']->generate('sucesso'));
//    }
//    else {
//        $app->abort(500, 'Erro de processamento');
//    }
//})
//    ->bind('cadastrar');


//$app->get('/sucesso',function() use ($app) {
//    return $app['twig']->render('sucesso.twig',array());
//})
//    ->bind('sucesso');
//
//$app->get('/link/{nome}',function($nome) use ($app) {
//
//    return $app['twig']->render('link.twig',array('nome'=>$nome));
//})
//    ->bind('link');
//
//$app->get('/criaAdmin',function() use ($app) {
//
//   $repo = $app['user_repository'];
//   $repo->createAdminUser('admin', 'admin');
//});
//
//$app->get('/',function() use ($app) {
//    return $app['twig']->render('index.twig', array(
//        'username' => $app['security']->getToken()->getUser()
//    ));
//});
//
//$app->get('/login', function(Request $request) use ($app) {
//    return $app['twig']->render('login.twig', array(
//        'error'         => $app['security.last_error']($request),
//        'last_username' => $app['session']->get('_security.last_username'),
//    ));
//})->bind('login');

