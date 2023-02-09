<?php
class Menu {
    protected $currentAction;
    
    public function __construct($action)
    {
        $this->currentAction = $action;
    }
    
    public function getMenu()
    {
        $productsLink = '<li class="nav-item">';
        $productsLink .= '<a class="nav-link" href="?action=products">Products</a>';
        $productsLink .= '</li>';
        $categoriesLink = '<li class="nav-item">';
        $categoriesLink .= '<a class="nav-link" href="?action=categories">Categories</a>';
        $categoriesLink .= '</li>';
        
        switch ($this->currentAction) {
            case 'products':
                $productsLink = '<li class="nav-item">';
                $productsLink .= '<a class="nav-link" style="background-color: #3fc1db; border-radius: 10px; margin-right: 100px;" href="?action=products">Products</a>';
                $productsLink .= '</li>';
                break;
            case 'categories':
                $categoriesLink = '<li class="nav-item">';
                $categoriesLink .= '<a class="nav-link" style="background-color: #3fc1db; border-radius: 10px;" href="?action=categories">Categories</a>';
                $categoriesLink .= '</li>';
                break;
            default:
                break;
        }
        
        return $productsLink . $categoriesLink;
    }
}

$menu = new Menu(isset($_GET['action']) ? $_GET['action'] : '');
echo $menu->getMenu();