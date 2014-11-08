<div class="row large-12">
  		<nav class="top-bar foundation-bar" data-topbar>
				<ul class="title-area">
					<li class="name">
					<h1><a href="?page=accueil"><i class="icon-white icon-home"></i> ENSA Khouribga</a></h1>
					</li>
				</ul>
			
			<section class="top-bar-section">
				<ul class="right">
					<?php
					if(isset($_SESSION['type']))
					{
					?>
					<li class="divider"></li>
						<?php
						if($_SESSION['type']=='Etudiant')
						{
						?>
					<li <?php if($_GET['page']=='espace_demandes_etudiant') echo 'class="active"' ?>><a href="?page=espace_demandes_etudiant">Demandes d'attestation</a></li>
						<?php
						}
						else
						{
						?>
						<li class="has-dropdown"><a href="#">Demandes des étudiants</a>
						<ul class="dropdown">
						<li class=" <?php if($_GET['page']=='espace_validation_demandes' ) echo 'active' ?>" ><a href="?page=espace_validation_demandes">Demandes d'attestation</a></li>
						<li class=" <?php if($_GET['page']=='espace_validation_corrections' ) echo 'active' ?>" ><a href="?page=espace_validation_corrections">Demandes de correction</a></li>
						</ul>
						</li>
						<?php
						}
						?>
						
					<li class="divider"></li>
					<li class=" <?php if($_GET['page']!='espace_demandes_etudiant' and $_GET['page']!='espace_validation_demandes') echo 'active' ?> has-dropdown"><a href="?page=<?php echo ($_SESSION['type']=='Etudiant')?'Espace_de_gestion_etudiant':'Espace_de_gestion_administrateur'?>"><i class="icon-white icon-user"></i> <?php echo $_SESSION['type'].' : '.htmlspecialchars($_SESSION['nom'].' '.$_SESSION['prenom']);?></a>
					<ul class="dropdown">
                    <li><a href="?page=Deconnexion"><i class="icon-white icon-off"></i> Se Deconnecter</a></li>
					</ul>
					</li>
					<?php
					}
					else
					{
					?>
					<li class="divider"></li>
					<li <?php if($_GET['page']=='etudiant') echo 'class="active"' ?>><a href="?page=etudiant"><div id="etudiantStop"><i class="icon-white icon-book"></i> Espace Etudiant</div></a></li>
					<li class="divider"></li>
					<li <?php if($_GET['page']=='administration') echo 'class="active"' ?>><a href="?page=administration"><div id="administrationStop"><i class="icon-white icon-star"></i> Espace Administration</div></a></li>
					<?php
					}
					?>
				</ul>
				</section>
				
			</nav>
	</div>