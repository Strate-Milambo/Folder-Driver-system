@extends('MainUser.MainTemplate')
@section('content')
            <div class="card mb-3">
            <div class="card-header">
              <h4 class="text-center mb-0">Questions fréquemment posées</h4>
            </div>
            <div class="card-body bg-body-tertiary">
              <h6> <a href="#!">Pourquoi j'utilise cette application?<span class="fas fa-caret-right ms-2"></span></a></h6>
              <p class="fs-10 mb-0">
                Alors cette question est tout simplement dû du fait que voulez avoir une meilleur entinté des stockages des vos données pour mieux collaborer avec vôtre entourage.
              </p>
              <hr class="my-3" />
              <h6> <a href="#!">Que répresente une donnée?<span class="fas fa-caret-right ms-2"></span></a></h6>
              <p class="fs-10 mb-0">
                Une donnée est tout simplemnt l'état brute d'une information ( une conssaince sans référence). Dans les cas de cette appliction les données séront répresentées par les différents fichiers et dossiers que vous aurez à votre possession. 
              </p>
              <hr class="my-3" />
              <h6> <a href="#!">Quelle est la différence entre un fichier et un dossier?<span class="fas fa-caret-right ms-2"></span></a></h6>
              <p class="fs-10 mb-0">
                La comprehension de ses deux termes, vous permettra de comprendre rapidement l'utilité  de cette application. De ce fait, Un dossier est une sorte de classeur dans lequel on range divers fichiers.  Par contre, Un fichier c'est un ensemble de données considérées comme étant une unité. Il peut être de tout type : un document en traitement de texte, un logiciel, une image, une chanson ... Chaque fichier porte un nom suivi d'une "extension"(le terme qui apparait après le nom du fichier. ex: myDocument.txt). 
                Bref, un fichier possède une nature propre. Par contre un dossier n'en possède pas.
              </p>
              <hr class="my-3" />
              <h6> <a href="#!">Quelle possibilité m'offrez-vous?<span class="fas fa-caret-right ms-2"></span></a></h6>
              <p class="fs-10 mb-0">
                L'application dans sa première version couvre déjè diverses activités qui vous sont illustrées dans les énumérations qui suivent:
                  <ul>
                    <li>La possibilité des stockés vos données importantes dans les systèmes.</li>
                    <li>La possibilité d'envoyer vos données à vos collaborateurs.</li>
                    <li>De maintenir une collaboration proffessionnelle avec vos collaborateurs en limitant la portée de chaque collaborateur.</li>
                    <li>De scanner toutes vos données avant de les a upload dans les sytèmes.</li>
                    <li>Une Rubrique des différentes données ayant été supprimé et envoyé  dans les systèmes.</li>
                    <li>Tand autres etc...</li>
                  </ul>
              </p>
              <hr class="my-3" />
              <h6> <a href="{{route('myFiles')}}">Comment crée un dossier?<span class="fas fa-caret-right ms-2"></span></a></h6>
              <p class="fs-10 mb-0">
              Pour créer un dossier, vous dévriez vous rendre sur l'interface visuelle de tout vos documents, et voir sur le coins supérieur gauche, y a un button qui vous permet de créer un dossier.
              </p>
              <hr class="my-3" />
              <h6> <a href="{{route('profile')}}">Comment éditer mon profile?<span class="fas fa-caret-right ms-2"></span></a></h6>
              <p class="fs-10 mb-0">
                pour éditer votre profile il suffit tout simplement de cliquer sur l'avatar de votre compte, il y aura un menu déroulant qui vous permettra de choisir la rubrique éditer mon profile.
              </p>
              <hr class="my-3" />
            </div>
           
          </div>
          <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('storage/avatars/design.jpg')}});"></div><!--/.bg-holder-->
            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Questions Avancées</h3>
                  <p class="mb-0">Vous trouverez ci-dessous les réponses aux questions qui se rapportent aux questions pertinentes</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="accordion border rounded overflow-hidden" id="accordionFaq">
                <div class="card shadow-none rounded-0 border-bottom">
                  <div class="accordion-item border-0">
                    <div class="card-header p-0" id="faqAccordionHeading1"><button class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start rounded-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion1" aria-expanded="false" aria-controls="collapseFaqAccordion1"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">Comment upload mes données dans le système?</span></button></div>
                    <div class="accordion-collapse collapse" id="collapseFaqAccordion1" aria-labelledby="faqAccordionHeading1" data-parent="#accordionFaq">
                      <div class="accordion-body p-0">
                        <div class="card-body pt-2">
                          <div class="ps-3 mb-0">
                            <p>l'upload des données dan le système se fait après que vous aillez été authentifié par le système ( connecté). Du coup, une fois dans le système il suffit de se rendre dans votre dasboard(tableau de board) pour avoir la possibilité de stocker les différentes données dans le système. <br>
                            De ce fait, le sytème vous offre deux types d'upload : 
                            <ol>
                              <li>L'upload des fichiers</li>
                              <li>L'upload des dossiers</li>
                            </ol>
                            Alors, choisissez l'uploading que vous souhaitérez entamé dans votre cas.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow-none rounded-0 border-bottom">
                  <div class="accordion-item border-0">
                    <div class="card-header p-0" id="faqAccordionHeading2"><button class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start rounded-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion2" aria-expanded="false" aria-controls="collapseFaqAccordion2"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">Comment envoyer mes données à mes collaborateurs?</span></button></div>
                    <div class="accordion-collapse collapse" id="collapseFaqAccordion2" aria-labelledby="faqAccordionHeading2" data-parent="#accordionFaq">
                      <div class="accordion-body p-0">
                        <div class="card-body pt-2">
                          <div class="ps-3 mb-0">
                            <p>
                              Pour envoyer les données à vos collaborateurs il faut remplir certains nombre de critères pour que le système rendre cette collaboration sécurisé et profféssionnelles.
                              <b>Marche à suivre: </b>
                            <ol>
                              
                              <li>Le collaborateur doit avoir un compte dans le système: cela permet de contrôler les données de transactions.</li>
                              <li>Vous devriez activer la collaboration des utilisateurs avec qui vous souhaitez collaborer.</li>
                              <li>Vous dévriez signalé au système que vous dévriez collaborer avec cet dernier, pour que le système vous génére  le code du collaborateur. </li>
                              <li>Après que le système vous aie généré le code vous dévriez le copier ou le mémoriser, afin que vous l'utilisé lors de vos échanges</li>
                              <li>Après toutes ces étapes vous pouvez transférez vos contenus aisement et sans crainte. en selectionnant  les données à transférer  et enfin en cliquant sur le button envoyer </li>
                              <li>le button envoyer vous offre deux entrées <b>L'email du collaborateur </b> ainsi que <b>le code du collaborateur que vous aviez copier</b> en remplissant ses deux champs vos données seront transfées en toute aisance</li>
                            </ol>
                            Maintenant, lancer vous le processus d'envoie des contenus avec vos différents collaborateurs.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow-none rounded-0 border-bottom">
                  <div class="accordion-item border-0">
                    <div class="card-header p-0" id="faqAccordionHeading3"><button class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start rounded-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion3" aria-expanded="false" aria-controls="collapseFaqAccordion3"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">Comment le collaborateur saura que je lui ai envoyé des contenus s'il ne pas connecté?</span></button></div>
                    <div class="accordion-collapse collapse" id="collapseFaqAccordion3" aria-labelledby="faqAccordionHeading3" data-parent="#accordionFaq">
                      <div class="accordion-body p-0">
                        <div class="card-body pt-2">
                          <div class="ps-3 mb-0">
                            <p class='mb-0'>Cela est est une question qui a été résolu avec un système de <code> notification</code>. En effet, après chaque envoie des contenus le destinateur est notifié de cette transaction et recevra le contenu que lorsqu'il acceptera de collaborer avec vous. </p>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow-none rounded-0 border-bottom">
                  <div class="accordion-item border-0">
                    <div class="card-header p-0" id="faqAccordionHeading4"><button class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start rounded-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion4" aria-expanded="false" aria-controls="collapseFaqAccordion3"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">Y a-t-il un moyen pour récupérer mes données supprimées?</span></button></div>
                    <div class="accordion-collapse collapse" id="collapseFaqAccordion4" aria-labelledby="faqAccordionHeading4" data-parent="#accordionFaq">
                      <div class="accordion-body p-0">
                        <div class="card-body pt-2">
                          <div class="ps-3 mb-0">
                            <p class='mb-0'>OUI, après chaque suppression l'application permet de garder ces données en corbeille avant de le jetter dans la poubelles 😅. LOL, Mais cette application veut toujours garder mes données ? <br>
                            En effet, c'est dans la corbeille que vous aurez la possibilité de restaurer tous vos données supprimées. AHH okay 😥, Et comment je supprime définitivement ces données ? <br>
                            oups, pour supprimer définitivement ( sachant que c'est une marche sans retour) vos données il suffit de le supprimer dans la corbeille.
                          </p>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card shadow-none rounded-0 ">
                  <div class="accordion-item border-0">
                    <div class="card-header p-0" id="faqAccordionHeading15"><button class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start rounded-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion15" aria-expanded="false" aria-controls="collapseFaqAccordion15"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">Comment seront structuré mes données dans mon dashboard?</span></button></div>
                    <div class="accordion-collapse collapse" id="collapseFaqAccordion15" aria-labelledby="faqAccordionHeading15" data-parent="#accordionFaq">
                      <div class="accordion-body p-0">
                        <div class="card-body pt-2">
                          <div class="ps-3 mb-0">
                            <p class="mb-0"> Vos données sont structurées avec une structuration d'empilement. C'est-à-dire, vous pouvez avoir des dossiers imbriqués dans des dossiers ou des fichiers imbriqués dans des dossiers, ainsi que des fichiers orphélins.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
      