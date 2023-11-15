# Tactik Elements for Oxygen

Plugin WordPress qui facilite l'obtention des champs ACF dans Oxygen grâce à un élément prévu à cet effet.

## Utilisation

Une fois dans le builder, le champ se trouve dans l'onglet Basics, sous Other (Field Element).

### Tags

_div_ est le tag par défaut. Les autres choix sont _h1_, _h2_, _h3_, _h4_ _h5_, _h6_ et _a_. Il est également possible d'utiliser un _custom tag_ grâce au checkbox.

__Important :__ Le tag _a_ fonctionne uniquement avec un champ ACF de type _Lien_ qui renvoit un tableau de valeur _(Array)_.

### Field Slug

Sert à spécifier le slug du champ qu'on souhaite intégrer.

### Field Location

Post, Option Page et Repeater.

À noter que Repeater n'affiche présentement pas la valeur dans le builder, mais sur le front-end elle apparaît correctement. __Je conseille de ne pas utiliser cette option pour l'instant.__