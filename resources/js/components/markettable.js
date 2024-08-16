import React, { Component } from 'react'
import ReactDom from 'react-dom'
import axios from 'axios';

var components = [<Line/>];

function Line(){
  return (
    <tr>Hello</tr>
  )
}

function add_line(){
  components.push(<Line/>)
}

function Lines(){
  return components.forEach((component)=>component);
}

export default function MarketTable(){
  return (
    <table id="dynamic_field" class="table table-striped table-bordered">
      <thead>
          <tr>
              <th><label>Désignation</label></th>
              <th><label>Description</label></th>
              <th><label>Quantité</label></th>
              <th><label>Rangement</label></th>
              <th><label>Prix Unitaire</label></th>
              <th><label>Montant</label></th>
              <th><label>Etat</label></th>
              <th><button class="btn btn-flat btn-block bg-olive" id="add_button" type="button" onClick={add_line}><i class='fa fa-plus'></i></button></th>
          </tr>
      </thead>
      <tbody>
        <tr>Hello</tr>
        <Lines/>
          
      </tbody>
    </table>
  );  
}


if(document.getElementById('market')){
    ReactDom.render(<MarketTable/>, document.getElementById('market'));
}