create table user_profile_details
(
    firstname               varchar,
    surname                 varchar,
    biogram                 varchar,
    id_user_profile_details serial
        constraint user_profile_details_pk
            primary key,
    profile_picture         varchar
);

alter table user_profile_details
    owner to zylpyrklrpbplp;

create unique index user_profile_details_id_user_profile_details_uindex
    on user_profile_details (id_user_profile_details);

INSERT INTO public.user_profile_details (firstname, surname, biogram, id_user_profile_details, profile_picture) VALUES ('John', 'Snow', 'aaaaaaaaaaaaaaaaaaaaa', 4, 'yellow-3.jpg');
INSERT INTO public.user_profile_details (firstname, surname, biogram, id_user_profile_details, profile_picture) VALUES ('Aleksandra', 'Rudy', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 5, 'pink-1.jpg');
INSERT INTO public.user_profile_details (firstname, surname, biogram, id_user_profile_details, profile_picture) VALUES ('juz', 'cccccccc', 'ssssssssssssssss', 6, 'pink-5.jpg');

create table "user"
(
    id_user                 serial
        constraint user_pk
            primary key,
    user_name               varchar not null,
    email                   varchar not null,
    password                varchar not null,
    id_user_profile_details integer
        constraint user_user_profile_details_id_user_profile_details_fk
            references user_profile_details
            on update cascade on delete cascade
);

alter table "user"
    owner to zylpyrklrpbplp;

create unique index user_user_id_uindex
    on "user" (id_user);

INSERT INTO public."user" (id_user, user_name, email, password, id_user_profile_details) VALUES (5, 'testowy', 'test@gmail.com', '$2y$10$j6BgCm3Wsva9QI2XOigOk.EIBJRsJBK2OJtVT2hDCFpLeKiKkRtlK', 4);
INSERT INTO public."user" (id_user, user_name, email, password, id_user_profile_details) VALUES (6, 'admin', 'admin@gmail.com', '$2y$10$nJjVd2JQNQMtj.OjtX0kX.bwi0lorDaVLtdtOx4LGc0NaDEezOB1G', 5);
INSERT INTO public."user" (id_user, user_name, email, password, id_user_profile_details) VALUES (7, 'aaa', 'aaa@gmail.com', '$2y$10$pS2oSfBV1gAtvH6SRepuouujeyJlIjDYCqfRYr0XBTjmZPpU1IrHe', 6);

create table image_categories
(
    id_image_categories integer not null
        constraint image_categories_pk
            primary key,
    image_category_name varchar not null
);

alter table image_categories
    owner to zylpyrklrpbplp;

INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (1, 'Animals');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (2, 'People');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (3, 'Landscapes');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (4, 'Monochrome');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (6, 'Street Photography');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (7, 'Portrait');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (8, 'Architecture');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (9, 'Macro Photography');
INSERT INTO public.image_categories (id_image_categories, image_category_name) VALUES (10, 'Product Photography');


create table image
(
    id_image            serial
        constraint image_pk
            primary key,
    id_user             integer not null
        constraint image_user_id_user_fk
            references "user"
            on update cascade on delete cascade,
    id_image_categories integer not null
        constraint image_image_categories_id_image_categories_fk
            references image_categories
            on update cascade on delete cascade,
    image               varchar(255),
    camera_name         varchar not null,
    lens_name           varchar not null,
    flash               varchar not null,
    aperture            varchar not null,
    exposure_time       varchar not null,
    focus_length        varchar not null,
    iso                 integer not null,
    light               varchar not null,
    post_date           date    not null,
    description         varchar
);

alter table image
    owner to zylpyrklrpbplp;

INSERT INTO public.image (id_image, id_user, id_image_categories, image, camera_name, lens_name, flash, aperture, exposure_time, focus_length, iso, light, post_date, description) VALUES (49, 5, 4, 'yellow-3.jpg', 'Canon 90D', 'Canon 70-200mm f/3.4', 'off', 'f/3.8', '1/200', '70mm', 300, 'natural', '2022-02-07', 'Lake in Indonesia');
INSERT INTO public.image (id_image, id_user, id_image_categories, image, camera_name, lens_name, flash, aperture, exposure_time, focus_length, iso, light, post_date, description) VALUES (50, 5, 8, 'blue-2.jpg', 'Nikon 900d', 'Nikkor 50-400mm f/1.8-4.8', 'off', 'f/3.8', '1/500', '120mm', 300, 'natural', '2022-02-07', 'Morning in city');
INSERT INTO public.image (id_image, id_user, id_image_categories, image, camera_name, lens_name, flash, aperture, exposure_time, focus_length, iso, light, post_date, description) VALUES (51, 5, 7, 'pink-3.jpg', 'Canon 50D', 'Canon 30mm f/2.8', 'off', 'f/2.8', '1/200', '30mm', 100, 'studio', '2022-02-07', 'Girl portrait');
INSERT INTO public.image (id_image, id_user, id_image_categories, image, camera_name, lens_name, flash, aperture, exposure_time, focus_length, iso, light, post_date, description) VALUES (52, 5, 1, 'yellow-2.jpg', 'Nikon 5100', 'Nikkor 35mm f/1.8', 'off', 'f/2.8', '1/200', '35mm', 100, 'studio', '2022-02-07', 'Dog ');
INSERT INTO public.image (id_image, id_user, id_image_categories, image, camera_name, lens_name, flash, aperture, exposure_time, focus_length, iso, light, post_date, description) VALUES (53, 5, 7, 'blue-3.jpg', 'Canon 50D', 'Canon 30mm f/2.8', 'off', 'f/2.8', '1/200', '30mm', 100, 'studio', '2022-02-07', 'Model 
#model #portrait #girl #potd');
INSERT INTO public.image (id_image, id_user, id_image_categories, image, camera_name, lens_name, flash, aperture, exposure_time, focus_length, iso, light, post_date, description) VALUES (54, 5, 2, 'pink-5.jpg', 'Nikon 900d', 'Sigma 35-70mm f/2.8', 'off', 'f/2.8', '1/200', '50mm', 200, 'natural', '2022-02-07', 'Model');
INSERT INTO public.image (id_image, id_user, id_image_categories, image, camera_name, lens_name, flash, aperture, exposure_time, focus_length, iso, light, post_date, description) VALUES (55, 7, 7, 'm-1.jpg', 'Nikon 5100', 'Nikkor 35mm f/1.8', 'off', 'f/2.8', '1/200', '50mm', 200, 'studio', '2022-02-07', 'aaaaaaaaaa');


create table articles
(
    article_id        serial
        constraint articles_pk
            primary key,
    article_title     varchar not null,
    article_content   varchar not null,
    article_post_date date    not null,
    article_picture   varchar
);

alter table articles
    owner to zylpyrklrpbplp;

create unique index articles_article_id_uindex
    on articles (article_id);

INSERT INTO public.articles (article_id, article_title, article_content, article_post_date, article_picture) VALUES (31, 'Makro Photography', 'Macro photography (or photomacrography[1][2] or macrography,[3] and sometimes macrophotography[4]) is extreme close-up photography, usually of very small subjects and living organisms like insects, in which the size of the subject in the photograph is greater than life size (though macrophotography also refers to the art of making very large photographs).[3][5] By the original definition, a macro photograph is one in which the size of the subject on the negative or image sensor is life size or greater.[6] In some senses, however, it refers to a finished photograph of a subject that is greater than life size.[7]

The ratio of the subject size on the film plane (or sensor plane) to the actual subject size is known as the reproduction ratio. Likewise, a macro lens is classically a lens capable of reproduction ratios of at least 1:1, although it often refers to any lens with a large reproduction ratio, despite rarely exceeding 1:1.[7][8][9][10]

Apart from technical photography and film-based processes, where the size of the image on the negative or image sensor is the subject of discussion, the finished print or on-screen image more commonly lends a photograph its macro status. For example, when producing a 6×4-inch (15×10-cm) print using 35 format (36×24 mm) film or sensor, a life-size result is possible with a lens having only a 1:4 reproduction ratio.[11][12]

Reproduction ratios much greater than 10:1 are considered to be photomicrography, often achieved with digital microscope (photomicrography should not be confused with microphotography, the art of making very small photographs, such as for microforms).

Due to advances in sensor technology, today''s small-sensor digital cameras can rival the macro capabilities of a DSLR with a "true" macro lens, despite having a lower reproduction ratio, making macro photography more widely accessible at a lower cost.[9][13] In the digital age, a "true" macro photograph can be more practically defined as a photograph with a vertical subject height of 24 mm or less.[14]', '2022-01-31', 'ekamelev-RTDMLoPUyVI-unsplash.jpg');
INSERT INTO public.articles (article_id, article_title, article_content, article_post_date, article_picture) VALUES (32, 'Street Photography', 'Street photography, also sometimes called candid photography, is photography conducted for art or enquiry that features unmediated chance encounters and random incidents[1] within public places. Although there is a difference between street and candid photography, it is usually subtle with most street photography being candid in nature and some candid photography being classifiable as street photography. Street photography does not necessitate the presence of a street or even the urban environment. Though people usually feature directly, street photography might be absent of people and can be of an object or environment where the image projects a decidedly human character in facsimile or aesthetic.[2][3]

The photographer is an armed version of the solitary walker reconnoitering, stalking, cruising the urban inferno, the voyeuristic stroller who discovers the city as a landscape of voluptuous extremes. Adept of the joys of watching, connoisseur of empathy, the flâneur finds the world "picturesque".

Susan Sontag, 1977
The street photographer can be seen as an extension of the flâneur, an observer of the streets (who was often a writer or artist).[4]

Framing and timing can be key aspects of the craft with the aim of some street photography being to create images at a decisive or poignant moment.

Street photography can focus on people and their behavior in public, thereby also recording people''s history. This motivation entails having also to navigate or negotiate changing expectations and laws of privacy, security and property. In this respect the street photographer is similar to social documentary photographers or photojournalists who also work in public places, but with the aim of capturing newsworthy events; any of these photographers'' images may capture people and property visible within or from public places. The existence of services like Google Street View, recording public space at a massive scale, and the burgeoning trend of self-photography (selfies), further complicate ethical issues reflected in attitudes to street photography.

However, street photography does not need to exclusively feature people within the frame. It can also focus on traces left by humanity that say something about life. Photographers such as William Eggleston often produce street photography where there are no people in the frame, but their presence is suggested by the subject matter.

Much of what is regarded, stylistically and subjectively, as definitive street photography was made in the era spanning the end of the 19th century[5] through to the late 1970s, a period which saw the emergence of portable cameras that enabled candid photography in public places.', '2022-01-31', 'ivan-tsaregorodtsev-KUFByOnh1cI-unsplash.jpg');
INSERT INTO public.articles (article_id, article_title, article_content, article_post_date, article_picture) VALUES (30, 'Free-Lens Photography', 'Freelensing is a photography technique used with interchangeable lens cameras in both film-based and digital photography. The lens is detached from the camera and held in front of the lens mount by hand during exposure. This allows the lens to be tilted or shifted creating a similar effect to a perspective control or "Tilt-Shift" lens, only with a lower degree of fidelity. The result is a combination of selective focus and light leakage which are used creatively to create surreal imagery. Because of the increase in flange focal distance, this technique is most successful with closeup or macro photography, where infinity focus is not essential.

The lens used does not necessarily have to be native to the brand of camera, since it is not physically attached to it. In addition, the lens may also be reversed for macro photography. By shooting through a normal to wide-angle lens backwards, increased magnification can be achieved. One of the by-products of freelensing is the introduction of "light leaks" which can be controlled to some degree and produce toy-camera like effects similar to those achieved with a Holga or Diana camera.

The process is facilitated by use of an SLR, DSLR or MILC, in which the focus, and to a lesser degree the composition of the image, can be previewed prior to capture. In the case of a rangefinder or similar non-reflex or non live-view camera, the resulting focus would be unpredictable enough to be impractical, and yet not impossible to achieve.

Freelensing is best accomplished in a relatively dry, dust-free environment due to exposure of the mirror box, and the dust-attracting sensor, to the elements. Once the photos have been captured, the lens should be remounted or a body cap installed to protect the mirror and sensor from dust or moisture. Frequent use of a bulb blower or electronic cleaning are recommended. Sensor cleaning requires special care so as to not damage components.', '2022-01-31', 'vertical-1.jpg');