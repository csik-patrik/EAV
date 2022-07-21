# Entity–attribute–value model

## What is EAV?

**Entity–attribute–value model** (**EAV**) is a [data model](https://en.wikipedia.org/wiki/Data_model "Data model") to encode, in a space-efficient manner, entities where the number of attributes (properties, parameters) that can be used to describe them is potentially vast, but the number that will actually apply to a given entity is relatively modest. Such entities correspond to the mathematical notion of a [sparse matrix](https://en.wikipedia.org/wiki/Sparse_matrix "Sparse matrix").

EAV is also known as **object–attribute–value model**, **vertical database model**, and **open schema**.

## Description of concepts

#### The entity:

In clinical data, the entity is typically a clinical event, as described above. In more general-purpose settings, the entity is a foreign key into an "objects" table that records common information about every "object" (thing) in the database – at the minimum, a preferred name and brief description, as well as the category/class of entity to which it belongs. Every record (object) in this table is assigned a machine-generated object ID.

The "objects table" approach was pioneered by Tom Slezak and colleagues at Lawrence Livermore Laboratories for the Chromosome 19 database, and is now standard in most large bioinformatics databases. The use of an objects table does not mandate the concurrent use of an EAV design: conventional tables can be used to store the category-specific details of each object.

The major benefit to a central objects table is that, by having a supporting table of object synonyms and keywords, one can provide a standard Google-like search mechanism across the entire system where the user can find information about any object of interest without having to first specify the category that it belongs to. (This is important in bioscience systems where a keyword like "acetylcholine" could refer either to the molecule itself, which is a neurotransmitter, or the biological receptor to which it binds.)

#### The attribute

In the EAV table itself, this is just an attribute ID, a foreign key into an Attribute Definitions table, as stated above. However, there are usually multiple metadata tables that contain attribute-related information, and these are discussed shortly.

#### The value

Coercing all values into strings, as in the EAV data example above, results in a simple, but non-scalable, structure: constant data type inter-conversions are required if one wants to do anything with the values, and an index on the value column of an EAV table is essentially useless. Also, it is not convenient to store large binary data, such as images, in  [Base64](https://en.wikipedia.org/wiki/Base64 "Base64")  encoded form in the same table as small integers or strings. Therefore, larger systems use separate EAV tables for each data type (including  [binary large objects](https://en.wikipedia.org/wiki/Binary_large_object "Binary large object"), "BLOBS"), with the metadata for a given attribute identifying the EAV table in which its data will be stored. This approach is actually quite efficient because the modest amount of attribute metadata for a given class or form that a user chooses to work with can be cached readily in memory. However, it requires moving of data from one table to another if an attribute’s data type is changed.

Source: [Entity–attribute–value model - Wikipedia](https://en.wikipedia.org/wiki/Entity%E2%80%93attribute%E2%80%93value_model)