<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar"
             src="{{asset('IMG-20180714-WA0002.jpg')}}"
             width="50%"
        >
        <div>
            <p class="app-sidebar__user-name">IAI-TOGO</p>

        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item"
               href="#">
                <i class="app-menu__icon fa fa-dashboard">

                </i>
                <span class="app-menu__label">Tableau de bord</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item"
               href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-product-hunt">
                </i>
                <span class="app-menu__label">Produits</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item"
                       href="{{Route('produit.index')}}">
                        <i class="icon fa fa-eye-slash">
                        </i>
                        Afficher les produits
                    </a>
                </li>
                <li><a class="treeview-item"
                       href="{{Route('produit.create')}}">
                        <i class="icon fa fa-plus">
                        </i>
                        Créer un nouveau produit
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item"
               href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-clone">
                </i>
                <span class="app-menu__label">Categories</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item"
                       href="{{Route('categorie.index')}}">
                        <i class="icon fa fa-eye-slash">
                        </i>
                        Afficher les categeories
                    </a>
                </li>
                <li><a class="treeview-item"
                       href="{{Route('categorie.create')}}">
                        <i class="icon fa fa-plus-square">
                        </i>
                        Créer une nouvelle categeorie
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item"
               href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-circle">
                </i>
                <span class="app-menu__label">Fournisseurs</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item"
                       href="{{Route('fournisseur.index')}}">
                        <i class="icon fa fa-eye-slash">
                        </i>
                        Afficher les fournisseurs
                    </a>
                </li>
                <li><a class="treeview-item"
                       href="{{Route('fournisseur.create')}}">
                        <i class="icon fa fa-plus-circle">
                        </i>
                        Créer un nouveau fournisseur
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item"
               href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-clone">
                </i>
                <span class="app-menu__label">Approvisionnements</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item"
                       href="{{Route('approvisionnement.index')}}">
                        <i class="icon fa fa-eye-slash">
                        </i>
                        Afficher les Approvisionnements
                    </a>
                </li>
                <li><a class="treeview-item"
                       href="{{Route('approvisionnement.create')}}">
                        <i class="icon fa fa-plus-circle">
                        </i>
                        Créer un nouvel approvisionnement
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a class="app-menu__item"
               href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-circle-o">
                </i>
                <span class="app-menu__label">Personnel</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item"
                       href="{{Route('personnel.index')}}">
                        <i class="icon fa fa-eye-slash">
                        </i>
                        Afficher le personnel
                    </a>
                </li>
                <li><a class="treeview-item"
                       href="{{Route('personnel.create')}}">
                        <i class="icon fa fa-plus">
                        </i>
                        Créer un nouveau personnel
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item"
               href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users">
                </i>
                <span class="app-menu__label">Groupes</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item"
                       href="{{Route('groupe.index')}}">
                        <i class="icon fa fa-eye-slash">
                        </i>
                        Afficher les groupes de personnes
                    </a>
                </li>
                <li>
                    <a class="treeview-item"
                       href="{{Route('groupe.create')}}">
                        <i class="icon fa fa-plus-square">
                        </i>
                        Créer un nouveau groupe de personnes
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item"
                       href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-clone">
                        </i>
                        <span class="app-menu__label">Entré & Sortie</span>
                        <i class="treeview-indicator fa fa-angle-right">
                        </i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item"
                            href="{{Route('composer.index')}}">
                        <i class="icon fa fa-file">
                        </i>
                                Entrée de produits
                    </a>
                </li>
                <li>
                    <a class="treeview-item"
                       href="{{Route('concerner.index')}}">
                        <i class="icon fa fa-file-o">
                        </i>
                        Sortie de produits
                    </a>
                </li>
            </ul>
                </li>
        <li class="treeview">
            <a class="app-menu__item"
               href="#" data-toggle="treeview">
                <i class="app-menu__icon fa phpdebugbar-fa-pie-chart">
                </i>
                <span class="app-menu__label"> Rôles & Permissions</span>
                <i class="treeview-indicator fa fa-angle-right">
                </i>
            </a>
            <ul class="treeview-menu">
        <li>
            <a class="app-menu__item" href="{{route('permission.index')}}">
                <i class="app-menu__icon fa fa-pie-chart">
                </i>
                <span class="app-menu__label">
                       Permissions</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="{{route('role.index')}}">
                <i class="app-menu__icon fa fa-pie-chart">
                </i>
                <span class="app-menu__label">
                       Rôles</span>
            </a>
        </li>
            </ul>
    </ul>
</aside>
