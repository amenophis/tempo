<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\UserBundle\Controller\Api\Rest;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\NamePrefix;


class UserController extends FOSRestController
{
    /**
     * GET Route annotation.
     * @Get("/users/search/{username}")
     */
    public function autocompleteAction(Request $request, $username)
    {
        $username = $request->query->get('term', $username);

        $em = $this->getDoctrine()->getManager();
        $users = array();

        $list_user = ($username == 'all'  ) ?
            $em->getRepository('TempoUserBundle:User')->findAll() :
            $em->getRepository('TempoUserBundle:User')->autocomplete($username);

        foreach($list_user as $name){
            $users[] = $name['username'];
        }

        // create a JSON-response with a 200 status code
        $response = new Response(json_encode($users ));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}