    <?php

    namespace CeresSadingo\Containers;

    use Plenty\Plugin\Templates\Twig;

    class CeresSadingo
    {
        public function call(Twig $twig):string
        {
            return $twig->render('CeresSadingo::CeresSadingo');
        }
    }
