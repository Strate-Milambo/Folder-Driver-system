@extends('MainUser.MainTemplate')
@section('content')

          <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div><!--/.bg-holder-->
            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Politique de confidentialité</h3>
                  <p class="mb-0">Une politique de confidentialité est une déclaration ou un document juridique qui divulgue tout ou partie de la manière dont une partie collecte, utilise, divulgue et gère les données d'un client ou d'une cliente.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0" id="account">compte</h5>
                </div>
                <div class="card-body">
                  <h6 class="text-primary">Admissibilité </h6>
                  <p class="fs-9 mb-0 fw-semi-bold">Pour utiliser le Service, vous devez :</p>
                  <ol type="1">
                    <li>être une entreprise ou un consommateur capable de conclure des contrats valides ;</li>
                    <li>terminer le processus d'inscription ;</li>
                    <li>accepter les Conditions ; et</li>
                    <li>fournir des informations de contact véridiques, complètes et à jour..</li>
                  </ol>
                  <hr class="my-4" />
                  <h6 class="text-primary">Accepter ces conditions</h6>
                  <p class="mb-0 ps-3">Ces Conditions s'appliquent à partir du moment où vous vous inscrivez au Service. Cliquer sur le bouton « okay » ou « learn more » sur la page d'accueil signifie que vous avez officiellement « signé » les Conditions et qu'un contrat contraignant prendra naissance sur la base des Conditions (« Accord »). Si vous vous inscrivez au Service au nom d'une entreprise ou d'une autre entité, vous déclarez et garantissez que vous avez le pouvoir d'accepter ces Conditions en leur nom.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Clôture de votre compte</h6>
                  <p class="mb-0 ps-3">You or we may terminate this Agreement at any time and for any reason by giving notice in writing (including email) to the other party. You need to clear the unpaid invoices (if any exists) before terminating this Agreement. Once terminated, we may permanently delete your account and all the data associated with it, including your Content from our Website.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Changements</h6>
                  <p class="mb-0 ps-3">Nous pouvons modifier n'importe laquelle des Conditions en publiant des Conditions d'utilisation révisées sur notre application et en envoyant un e-mail à la dernière adresse e-mail que vous nous avez fournie ou un message à votre espace de compte du Service (« Tableau de bord »). À moins que vous ne résiliez votre compte dans les sept (7) jours suivant cet e-mail, les nouvelles Conditions entreront en vigueur immédiatement et s'appliqueront à toute utilisation continue ou nouvelle du Service. Nous pouvons modifier l'application, le service ou toute fonctionnalité du service à tout moment.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Compte et mot de passe</h6>
                  <p class="mb-0 ps-3">Vous êtes responsable de la confidentialité de votre nom de compte et de votre mot de passe. Vous êtes également responsable de toute utilisation de votre compte, que vous en ayez autorisé ou non l'utilisation. Vous devez immédiatement nous informer de toute utilisation non autorisée de vos comptes. Nous ne sommes pas responsables des pertes dues à des mots de passe volés ou piratés. Nous n'avons pas accès à votre mot de passe actuel et, pour des raisons de sécurité, nous pouvons uniquement réinitialiser votre mot de passe.</p>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0" id="subscriptions">Abonnements et paiement</h5>
                </div>
                <div class="card-body">
                  <h6 class="text-primary">Service gratuit</h6>
                  <p class="mb-0 ps-3">Nous pouvons mettre certains services à votre disposition gratuitement, dans la limite de certaines limites décrites sur le site Web (« Services gratuits »). L'utilisation des Services au-delà de ces limites nécessite un paiement. Nous pouvons mettre fin à votre accès aux services gratuits à tout moment sans préavis et n'aurons aucune responsabilité concernant une telle résiliation. Sans limiter la portée de l'article 15, les Services gratuits sont fournis sans aucune garantie.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Service payant</h6>
                  <ol type="1">
                    <li>Si vous utilisez nos Services et dépassez les limites des Services gratuits que nous proposons, la section « Service payant » s'applique pour vous.</li>
                    <li>Le « Paiement de la facture » ​​correspond aux frais payables pour votre facture, tels que spécifiés lorsque vous utilisez notre Service au-delà de la limite d'utilisation gratuite. Vous nous paierez le paiement de la facture pour la durée de votre utilisation payée.</li>
                    <li>Vous ne serez pas facturé pour l'utilisation de nos services jusqu'à ce que votre utilisation dépasse la limite d'utilisation gratuite. À la fin de chaque mois (si vous avez utilisé au-delà de notre limite d'utilisation gratuite), nous générerons une facture contenant vos informations d'utilisation et le montant dû pour ce mois..</li>
                    <li>Les frais de facturation sont payables dans la devise spécifiée lors de votre inscription au service et excluent la taxe sur la valeur ajoutée (ou toute autre taxe de vente applicable), qui sera ajoutée au taux approprié.</li>
                  </ol>
                  <hr class="my-4" />
                  <h6 class="text-primary">Cartes de crédit</h6>
                  <p class="mb-0 ps-3">Tant que vous êtes un utilisateur payant ou que vous avez un solde impayé chez nous, vous nous fournirez des informations de carte de crédit valides et nous autoriserez à déduire les frais de facture mensuels de cette carte de crédit (en considérant que vous avez utilisé au-delà de notre limite d'utilisation gratuite). . Nous ne sauvegardons pas les informations de carte que vous avez fournies, nous utilisons plutôt Stripe. Vous devez remplacer les informations de toute carte de crédit qui expire par les informations d'une autre carte de crédit valide. Vous pouvez ajouter plusieurs cartes de crédit dans notre service, mais seule la carte que vous marquez comme principale sera utilisée pour vous facturer l'utilisation des services payants. </p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Remboursements</h6>
                  <p class="mb-0 ps-3">Vous n'aurez pas droit à un remboursement de notre part. En tant que service postpayé, il n'est pas valide. Mais si votre facture contient des informations inappropriées en raison d'un bug de l'application ou pour toute autre raison, nous vous rembourserons le montant supplémentaire que nous avons facturé dans les 14 jours ouvrables suivant la découverte. Vous devez nous informer du montant supplémentaire qui vous est facturé.</p>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0" id="termination">Résiliation</h5>
                </div>
                <div class="card-body">
                  <p class="mb-0 ps-3">Soit vous, soit nous pouvons résilier le présent Contrat sur notification écrite à l'autre partie d'une violation substantielle, ou si l'autre partie fait l'objet d'une requête dans le cadre d'une procédure d'insolvabilité, de faillite, de mise sous séquestre, de liquidation ou de cession au profit de ses créanciers..</p>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0" id="rules">Règles et abus</h5>
                </div>
                <div class="card-body">
                  <h6 class="text-primary">Règles générales</h6>
                  <p class="fs-9 mb-0 fw-semi-bold">Vous vous engagez à suivre ces règles :</p>
                  <ol type="1">
                    <li>Vous n'enverrez pas de spam ! Par « spam », nous entendons la définition fournie par Spamhaus ;</li>
                    <li>Vous n'utiliserez pas de listes d'adresses e-mail achetées, louées ou tierces ;</li>
                    <li>Vous ne violerez pas notre <a href="#!">politique d'utilisation acceptable </a> , qui fait partie du présent accord ;</li>
                    <li>Si vous enfreignez l'une de ces règles, nous pouvons alors suspendre ou résilier votre compte ;</li>
                    <li>Vous vous conformerez à toutes les législations applicables en matière de protection des données, y compris le règlement général sur la protection des données de l'UE ; et</li>
                    <li>Vous ne pouvez utiliser notre bande passante que pour votre utilisation du Service.</li>
                  </ol>
                  <hr class="my-4" />
                  <p class="fs-9 mb-0 fw-semi-bold">Tu devrais:</p>
                  <ol type="1">
                    <li>nous fournir toute la coopération nécessaire en relation avec le Service et tout l'accès nécessaire aux informations dont nous pouvons avoir besoin afin de vous fournir le Service ;</li>
                    <li>respecter toutes les lois et réglementations applicables en ce qui concerne votre contenu et vos activités en vertu des présentes conditions ;</li>
                    <li>obtenir et conserver toutes les licences, consentements et autorisations nécessaires pour que nous, nos sous-traitants et agents puissions remplir nos obligations en vertu des présentes Conditions, y compris, sans s'y limiter, le Service ;</li>
                   
                  </ol>
                  <hr class="my-4" />
                  <h6 class="text-primary">Signaler un abus</h6>
                  <p class="mb-0 ps-3"> Si vous pensez que quelqu'un enfreint l'une de ces conditions, veuillez <a href="mailto:support@themewagon.com">nous en informer</a> immédiatement. Si vous pensez que quelqu'un a publié du matériel qui viole les droits d'auteur, vous pouvez<a href="mailto:support@themewagon.com">nous en informer</a>.</p>
                  <hr class="my-4" />
                  <!-- <h6 class="text-primary">SES and third-party providers</h6>
                  <ol type="1">
                    <li>As a condition of using the Service, you shall enable us to access your AWS account. Subject to the terms of these Terms, you acknowledge and agree that access to AWS, the AWS Simple Email Service (SES) and the AWS Simple Notification Service (SNS) is not provided to you under these Terms, and is subject to a separate agreement between you and Amazon Web Services.</li>
                    <li>falcon facilitates integration with a number of third party services which you can use in relation to your account or your Contents (“Third Party Service”), although we make no warranty as to any ongoing support for any third party service. We make no representation or commitment and shall have no liability or obligation whatsoever in relation to the content or use of, or correspondence with, any Third Party Service. Any contract entered into and any transaction completed by means of your use of the Service with any Third Party Service is between you and the relevant third party, and not us. We recommend that you refer to the third party’s website terms and conditions and privacy policy prior to using the relevant Third Party Service.</li>
                    <li>You acknowledge that the AWS or an operator of a Third Party Service may render ineffective or impair the sending, receipt of viewing of any Content (for example, by breaking links in the Content or removing images from the Content). For the avoidance of doubt, you acknowledge that we shall have no liability to you in respect of any such action. </li>
                    <li>If at any time you cease to have a current SES account in good standing, you will be unable to use the Service. Your obligation to pay for any unpaid invoice fees will remain unaffected.</li>
                  </ol> -->
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0" id="liability">Responsabilité/h5>
                </div>
                <div class="card-body">
                  <h6 class="text-primary">Indemnité</h6>
                  <p class="mb-0 ps-3">Vous devez nous défendre, nous indemniser et nous dégager de toute responsabilité contre les réclamations, actions, procédures, pertes, dommages, dépenses et coûts (y compris, sans limitation, les frais de justice et les frais juridiques raisonnables) découlant de ou en relation avec votre utilisation du Service (ou notre prise en charge). toute action en relation avec le Service selon vos instructions), y compris toute réclamation ou action d'un destinataire de tout Contenu envoyé au moyen du Service.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Notre responsabilité en cas de perte ou de dommage si vous êtes une entreprise</h6>
                  <p class="fs-9 mb-0 fw-semi-bold">Notre responsabilité en cas de perte ou de dommage si vous êtes une entreprise</p>
                  <ol type="1">
                    <li>découlant de ou en relation avec les présentes Conditions ;</li>
                    <li>en ce qui concerne toute utilisation que vous faites du Service ; et</li>
                    <li>à l'égard de toute représentation, déclaration ou acte délictuel ou omission (y compris la négligence) découlant de ou en relation avec les présentes Conditions.</li>
                  </ol>
                  <hr class="my-4" />
                  <p class="fs-9 mb-0 fw-semi-bold">Sauf disposition expresse et spécifique des présentes Conditions :</p>
                  <ol type="1">
                    <li>vous assumez l'entière responsabilité des résultats obtenus grâce à votre utilisation du Service et des conclusions tirées de cette utilisation. Nous ne pourrons être tenus responsables de tout dommage causé par des erreurs ou des omissions dans les informations, instructions ou scripts que vous nous avez fournis en relation avec le Service, ou par toute action entreprise par nous selon vos instructions ;</li>
                    <li>toutes les garanties, représentations, conditions et toutes autres conditions de quelque nature que ce soit implicites par la loi ou la common law sont, dans toute la mesure permise par la loi applicable, exclues des présentes Conditions ; et</li>
                    <li>le Service vous est fourni « tel quel ».</li>
                  </ol>
                  <hr class="my-4" />
                  <p class="fs-9 mb-0 fw-semi-bold">Rien dans les présentes Conditions n'exclut notre responsabilité :</p>
                  <ol type="1">
                    <li>en cas de décès ou de blessures corporelles causés par notre négligence ; ou</li>
                    <li>pour fraude ou déclaration frauduleuse.</li>
                  </ol>
                  <hr class="my-4" />
                  <p class="fs-9 mb-0 fw-semi-bold">Sous réserve de la section 15.3 ci-dessus : Nous ne serons pas responsables, que ce soit en cas de délit (y compris pour négligence ou manquement à une obligation légale), de contrat, de fausse déclaration, de restitution ou autre pour </p>
                  <ol type="1">
                    <li>perte de profits,</li>
                    <li>perte d'activité,,</li>
                    <li>depletion of goodwill and/or similar losses,</li>
                    <li>perte ou corruption de données ou d'informations,</li>
                  
                  </ol>
                  <hr class="my-4" />
                  <p class="fs-9 mb-0 fw-semi-bold">Notre responsabilité en cas de perte ou de dommage si vous êtes un consommateur</p>
                  <ol type="1">
                    <li>Nous sommes responsables envers vous des pertes et dommages prévisibles causés par nous. Si nous ne respectons pas ces conditions, nous sommes responsables des pertes ou des dommages que vous subissez et qui sont un résultat prévisible de notre rupture de ce contrat ou de notre manquement à faire preuve de soins et de compétences raisonnables, mais nous ne sommes pas responsables de toute perte ou dommage qui est pas prévisible. Une perte ou un dommage est prévisible s'il est évident qu'il se produira ou si, au moment de la conclusion du contrat, nous et vous savions que cela pourrait se produire, par exemple si vous en avez discuté avec nous pendant le processus de vente..</li>
                    <li>Nous n’excluons ni ne limitons en aucune façon notre responsabilité envers vous lorsqu’il serait illégal de le faire. Cela inclut la responsabilité en cas de décès ou de blessures corporelles causées par notre négligence ou la négligence de nos employés, agents ou sous-traitants ; pour fraude ou fausse déclaration frauduleuse ; pour violation de vos droits légaux de consommateur en relation avec le Service.</li>
                    <li>Nous ne sommes pas responsables des pertes commerciales. Si vous êtes un consommateur, nous vous fournissons nos services uniquement pour un usage domestique et privé. Si vous utilisez notre service à des fins commerciales ou de revente, notre responsabilité envers vous sera limitée comme indiqué à l'article 15.</li>
                  </ol>
                  <hr class="my-4" />
                  <p class="fs-9 mb-0 fw-semi-bold">Force majeure</p>
                  <p class="mb-0 ps-3">Nous ne serons pas tenus responsables de tout retard ou échec dans l'exécution de toute partie du Service, pour toute cause indépendante de notre volonté. Cela inclut, sans toutefois s'y limiter, les modifications apportées aux lois ou aux réglementations, les embargos, les incendies, les tremblements de terre, les inondations, les grèves, les pannes de courant, les conditions météorologiques inhabituellement sévères et les actes de pirates informatiques ou de fournisseurs de services Internet tiers.</p>
                  <hr class="my-4" />
                  <p class="fs-9 mb-0 fw-semi-bold">Terme de traitement des données</p>
                  <p class="mb-0 ps-3"> Dans la mesure où vous êtes une entreprise et que nous traitons des données personnelles en votre nom dans le cadre de la fourniture des Services, les<a href="#!">conditions de traitement des données</a> s'appliquent et sont intégrées aux présentes Conditions.</p>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0" id="rights">Droits</h5>
                </div>
                <div class="card-body">
                  <h6 class="text-primary">Droits de propriété qui nous appartiennent</h6>
                  <p class="mb-0 ps-3">Sous réserve des droits limités expressément accordés dans les présentes Conditions, nous réservons tous nos droits sur les Services, y compris tous nos droits de propriété intellectuelle associés. Aucun droit ne vous est accordé en vertu des présentes Conditions autres que ceux expressément énoncés dans les présentes Conditions. Vous respecterez nos droits de propriété. « DataNested » et le logo « Datadrive » sont des status que Vous n'êtes pas autorisé par nous à utiliser nos marques commerciales ou nos actifs de marque sans autorisation préalable.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Droits de propriété qui vous appartiennent</h6>
                  <p class="mb-0 ps-3">Vous déclarez et garantissez que vous possédez ou avez la permission d'utiliser tout votre contenu. Vous conservez la propriété de votre Contenu. En utilisant le Service, vous nous accordez, ainsi qu'à nos agents et sous-traitants, une licence pour utiliser votre Contenu afin que nous puissions fournir et assurer le bon fonctionnement du Service. Vous reconnaissez et acceptez que nous aurons le droit d'utiliser votre contenu de manière anonyme (qui ne vous identifie pas ni le destinataire) dans le but d'augmenter nos techniques d'identification du spam.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">politique de confidentialité</h6>
                  <p class="mb-0 ps-3">Nous pouvons utiliser et divulguer vos informations conformément à notre politique de confidentialité. Notre politique de confidentialité est traitée dans le cadre de ces conditions</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Renoncer</h6>
                  <p class="mb-0 ps-3">Même si nous tardons à appliquer ces conditions, nous pouvons toujours les faire appliquer plus tard. Si nous n'insistons pas immédiatement pour que vous fassiez tout ce que vous êtes tenu de faire en vertu des présentes conditions, ou si nous tardons à prendre des mesures contre vous en raison de votre violation de ces conditions, cela ne signifie pas que vous n'êtes pas obligé de faire ces choses et cela ne nous empêchera pas de prendre ultérieurement des mesures à votre encontre..</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Survie</h6>
                  <p class="mb-0 ps-3">Chacune de ces conditions qui, expressément ou implicitement, est destinée à continuer ou à entrer en vigueur à la date ou après la résiliation du présent Accord restera pleinement en vigueur. Sans limitation, les clauses 14 Indemnité, 15 Notre responsabilité pour les pertes ou dommages subis par vous si vous êtes une entreprise, 16 Notre responsabilité pour les pertes ou dommages subis par vous si vous êtes un consommateur, 18 Conditions de traitement des données, 28 Droits des tiers, 29 Si vous êtes une entreprise – la loi et la juridiction régissant, et 30 Quelles lois s'appliquent à ce contrat et où vous pouvez engager des poursuites judiciaires si vous êtes un consommateur resteront pleinement en vigueur malgré la résiliation du présent Accord.</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Rupture</h6>
                  <ol type="1">
                    <li>Si une disposition (ou une partie d’une disposition) des présentes Conditions est jugée invalide, inapplicable ou illégale par un tribunal ou un organe administratif compétent, les autres dispositions resteront en vigueur.</li>
                    <li>Si une disposition invalide, inapplicable ou illégale serait valide, exécutoire ou légale si une partie de celle-ci était supprimée, la disposition s'appliquera avec toute modification nécessaire pour donner effet à l'intention commerciale des parties.</li>
                  </ol>
                  <hr class="my-4" />
                  <h6 class="text-primary">Accord complet</h6>
                  <ol type="1">
                    <li>Les présentes Conditions et tous les documents qui y sont mentionnés constituent l'intégralité de l'accord entre les parties et remplacent tout arrangement, entente ou accord antérieur entre elles concernant l'objet qu'elles couvrent.</li>
                    <li>Chacune des parties reconnaît et accepte qu'en acceptant les présentes Conditions, elle ne s'appuie sur aucun engagement, promesse, assurance, déclaration, représentation, garantie ou entente (que ce soit par écrit ou non) de toute personne (qu'elle soit partie aux présentes Conditions ou non). ) relatifs à l'objet des présentes Conditions, autre que ce qui est expressément indiqué dans les présentes Conditions.</li>
                  </ol>
                  <h6 class="text-primary">Affectation</h6>
                  <ol type="1">
                    <li>Vous ne devez pas, sans notre consentement écrit préalable, céder, transférer, facturer, sous-traiter ou traiter de toute autre manière tout ou partie de nos droits ou obligations en vertu des présentes Conditions.</li>
                    <li>Nous pouvons à tout moment céder, transférer, facturer, sous-traiter ou traiter de toute autre manière tout ou partie de nos droits ou obligations en vertu des présentes Conditions.</li>
                  </ol>
                  <hr class="my-4" />
                  <h6 class="text-primary">Aucun partenariat ni agence</h6>
                  <p class="mb-0 ps-3">Rien dans les présentes Conditions n'a pour but ou n'aura pour effet de créer un partenariat entre les parties, ou d'autoriser l'une des parties à agir en tant qu'agent de l'autre, et aucune des parties n'aura le pouvoir d'agir au nom ou pour le compte de ou de lier autrement. l'autre de quelque manière que ce soit (y compris, mais sans s'y limiter, la formulation de toute représentation ou garantie, la prise en charge de toute obligation ou responsabilité et l'exercice de tout droit ou pouvoir).</p>
                  <hr class="my-4" />
                  <h6 class="text-primary">Ces Conditions ne confèrent aucun droit à toute personne ou partie autre que vous et nous.</p>
                  
                  
                  <p class="pt-2">Merci d'avoir pris le temps de lire ces Conditions. ☺</p>
                  <p>Dernière mise à jour : 22 mai 2024</p>
                </div>
              </div>
              <!-- <div class="card mb-3 mb-lg-0">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0" id="instructions"> Instructions</h5>
                </div>
                <div class="card-body">
                  <h6 class="mb-3 text-primary">Instructions for Processing: </h6>
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="bg-300">
                        <td><strong>Description</strong></td>
                        <td><strong>Details</strong></td>
                      </tr>
                      <tr>
                        <td>Subject matter of the processing </td>
                        <td>Providing the Customer with bulk email sending via the Falcon platform.</td>
                      </tr>
                      <tr>
                        <td>Duration of the processing </td>
                        <td>For the duration of the Agreement</td>
                      </tr>
                      <tr>
                        <td>Nature and purposes of the processing</td>
                        <td>Sending campaigns through the Falcon platform storing email addresses provided through one of our forms or integrations. Storing data on recipient behavior, whether they click, open, unsubscribe, bounce when a campaign is sent. Actioning on the Customer’s behalf any ‘unsubscribe’ requests from recipients of messages sent using the Service.</td>
                      </tr>
                      <tr>
                        <td>Type of Personal Data </td>
                        <td>Email address, Customer IP Address, First Name, Last Name, Timezone and any other personal data provided through a custom field.</td>
                      </tr>
                      <tr>
                        <td>Categories of Data Subject</td>
                        <td>Recipients of the emails as specified when creating a campaign</td>
                      </tr>
                      <tr>
                        <td>Plan for return and destruction of the data once the Customer wants to destroy them UNLESS there is a requirement under EU or applicable EU Member State law to preserve that type of data</td>
                        <td>Campaign data (Sent, Delivered, Fails, Bounces, Opens, Clicks, Revenues, Sells, Complaints, Unsubscribes), Customer data (email addresses, first name, last name, timezone, and any associated custom fields) will be held forever until the request to terminate The customer data is received.</td>
                      </tr>
                    </tbody>
                  </table>
                  <p>IN WITNESS WHEREOF, this Addendum is entered into and becomes a binding part of the Agreement with effect from the last date of execution below.</p>
                  <div class="row">
                    <div class="col-6">
                      <p><strong>Falcon</strong><br /></p>
                      <p><strong>Signature _____________________________</strong><br /></p>
                      <p><strong>Name: John Doe</strong><br /></p>
                      <p><strong>Title: CEO</strong><br /></p>
                      <p><strong>Date Signed: </strong></p>
                    </div>
                    <div class="col-6">
                      <p><strong>Customer: </strong><br /></p>
                      <p><strong>Signature _____________________________</strong><br /></p>
                      <p><strong>Name: </strong><br /></p>
                      <p><strong>Title: </strong><br /></p>
                      <p><strong>Date Signed: </strong></p>
                    </div>
                  </div>
                  <p>Last update: 04 Nov 2020</p>
                </div>
              </div> -->
            </div>
            <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">
                <div class="card sticky-top">
                  <div class="card-header border-bottom">
                    <h6 class="mb-0 fs-9">Sur cette page</h6>
                  </div>
                  <div class="card-body">
                    <div class="terms-sidebar nav flex-column fs-10" id="terms-sidebar">
                      <div class="nav-item"><a class="nav-link px-0 py-1" href="#account">Compte</a></div>
                      <div class="nav-item"><a class="nav-link px-0 py-1" href="#subscriptions">Abonemments</a></div>
                      <div class="nav-item"><a class="nav-link px-0 py-1" href="#termination">Résilation</a></div>
                      <div class="nav-item"><a class="nav-link px-0 py-1" href="#rules">Règles et abus </a></div>
                      <div class="nav-item"><a class="nav-link px-0 py-1" href="#liability">Liability</a></div>
                      <div class="nav-item"><a class="nav-link px-0 py-1" href="#rights">Droits</a></div>
                      <div class="nav-item"><a class="nav-link px-0 py-1" href="#instructions">Instructions</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        


@endsection