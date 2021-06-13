<?php

namespace App\Controller;
use App\Entity\Movie;
use App\Entity\Genre;
use App\Entity\Actor;
use App\Entity\Studio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MovieRepository;
use App\Repository\GenreRepository;
use App\Repository\ActorRepository;
use App\Repository\StudioRepository;

class MainController extends AbstractController
{
    private $repoMovie;

    public function __construct(MovieRepository $repoMovie) {
        $this->repoMovie = $repoMovie;
    }
    /**
     * @Route("/", name="index")
     */
    public function index(MovieRepository $repoMovie): Response
    {
        // $repo = $this->getDoctrine()->getRepository(Movie::class);

        $movies = $this->repoMovie->findAll();

        // $genres = $repoGenre->findAll();

        return $this->render("main/index.html.twig", [
            'movies'=>$movies,
            // 'genres'=>$genres,
        ]);
    }
    /**
     * @Route("/actors", name="actors")
     */
    public function actors(ActorRepository $repoActor): Response
    {
        $movies = $this->repoMovie->findAll();

        $actors = $repoActor->findAll();

        return $this->render("main/actors.html.twig", [
            'movies'=>$movies,
            'actors'=>$actors,
        ]);
    }
    /**
     * @Route("/genres", name="genres")
     */
    public function genres(GenreRepository $repoGenre): Response
    {
        $movies = $this->repoMovie->findAll();

        $genres = $repoGenre->findAll();

        return $this->render("main/genres.html.twig", [
            'movies'=>$movies,
            'genres'=>$genres,
        ]);
    }
    /**
     * @Route("/studios", name="studios")
     */
    public function studios(StudioRepository $repoStudio): Response
    {
        $movies = $this->repoMovie->findAll();

        $studios = $repoStudio->findAll();

        return $this->render("main/studios.html.twig", [
            'movies'=>$movies,
            'studios'=>$studios,
        ]);
    }
    /**
     * @Route("/actors/{firstName}", name="showByActor")
     */
    public function showByActor(Actor $actor): Response
    {
        // if(!$actor)
        //     return $this->redirectToRoute('main');
        return $this->render("main/index.html.twig", [
            'movies' => $actor->getMovies(),
            'images' => $actor->getImage(),
            'firstName' => $actor->getFirstName(),
            'lastName' => $actor ->getLastName(),
        ]);
    }
    /**
     * @Route("/genres/{name}", name="showByGenre")
     */
    public function showByGenre(Genre $genre): Response
    {
        if(!$genre)
            return $this->redirectToRoute('index');

        return $this->render("main/index.html.twig", [
            'movies' => $genre->getMovies(),
        ]);
    }
    /**
     * @Route("/studios/{name}", name="showByStudio")
     */
    public function showByStudio(Studio $studio): Response
    {
        if(!$studio)
            return $this->redirectToRoute('index');

        return $this->render("main/index.html.twig", [
            'movies' => $studio->getMovies(),
        ]);
    }
    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {

        return $this->render("main/about.html.twig");

    }
     /**
     * @Route("/vu", name="vu")
     */
    public function vu(MovieRepository $repoMovie): Response
    {
        // if(!$movie)
        //     return $this->redirectToRoute('index');

        $movies = $this->repoMovie->findBy(array('seen'=>'false'));

        return $this->render("main/vu.html.twig", [
            // 'movies' => $movie->getMovies(),
            'movies'=>$movies,
        ]);
    }
}
