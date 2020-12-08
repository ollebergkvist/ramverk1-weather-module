<?php

namespace Olbe19\APIDocumentation;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for API Documentation view
 *
 */
class APIDocumentationController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * This is the index method action, it handles:
     * GET METHOD mountpoint
     * GET METHOD mountpoint/
     * GET METHOD mountpoint/index
     *
     * @return object
     */
    public function indexActionGet(): object
    {
        $page = $this->di->get("page");
        $title = "API";
        $page->add("APIDocumentation/index");

        return $page->render([
            "title" => $title,
        ]);
    }
}
