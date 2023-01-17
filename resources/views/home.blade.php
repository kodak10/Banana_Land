@extends('layouts.master')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
          <div class="col-lg-8">
            <div class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
                <div class="content">
                    <div class="content-header d-flex justify-content-between">
                        <span>Liste des Utilisateurs</span>
                        <a href="">Ajouter un Utilisateur</a>
                    </div>
                </div>
                <table class="table mt-5">
                  <thead class="table-dark">
                    <tr class="mb-3">
                      <th scope="col">#</th>
                      <th scope="col">Nom Complet</th>
                      <th scope="col">Email</th>
                      <th scope="col">Fonction</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                      <td class="d-flex"><a href="" style="margin-right: 10px;">Editer</a> <a href="">Supprimer</a></td>
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                      <td class="d-flex"><a href="" style="margin-right: 10px;">Editer</a> <a href="">Supprimer</a></td>
                    </tr>
                    
                  </tbody>
                </table>
            </div>
            
          </div>

          <!-- <div class="col-lg-4">
            <h4 class="mb-3">Ajout d'un Utilisateur</h4>
            <form class="row g-3 needs-validation" novalidate>
                
                <div class="row mb-3">
                    <div class="col-6">
                      <label for="nom_complet" class="form-label">Nom Complet</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
      
                    <div class="col-6">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                      <label for="nom_complet" class="form-label">Fonction</label>
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Fonction</option>
                        <option value="Partenaires">Partenaires</option>
                        <option value="Recouvreurs">Recouvreurs</option>
                        <option value="Comptables">Comptables</option>
                      </select>
                    </div>
    
                    <div class="col-6">
                      <label for="nom_complet" class="form-label">Photo de profil</label>
                      <input type="file" name="photo_profil" class="form-control" id="photo_profil" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-6">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-6">
                    <label for="yourPassword" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Ajouter le compte</button>
              </div>
              
            </form>
          </div> -->
        

      </div>
    </section>

  </main><!-- End #main -->
@endsection
