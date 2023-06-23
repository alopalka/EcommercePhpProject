CREATE TABLE products
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100)   NOT NULL,
    description TEXT,
    price       DECIMAL(10, 2) NOT NULL,
    image       VARCHAR(255)
);

INSERT INTO products (name, description, price, image)
VALUES ('Protein Plus', 'Advanced protein formula for muscle recovery and growth', 39.99, 'protein_plus.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Pre-Workout Ignite', 'Powerful pre-workout blend for energy and focus', 29.99, 'preworkout_ignite.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Fat Burn Extreme', 'Cutting-edge fat burner to support weight loss goals', 49.99, 'fatburn_extreme.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Muscle Maximizer', 'Advanced muscle-building supplement with essential nutrients', 44.99,
        'muscle_maximizer.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Joint Support Plus', 'High-quality joint support formula for optimal joint health', 24.99,
        'joint_support_plus.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Brain Boost Elite', 'Enhances cognitive function and mental clarity', 39.99, 'brain_boost_elite.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Recovery Matrix', 'Advanced post-workout supplement for faster recovery', 34.99, 'recovery_matrix.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Immune Defense', 'Boosts immune system function and supports overall health', 19.99, 'immune_defense.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Energy Blast', 'Provides sustained energy for improved performance', 27.99, 'energy_blast.jpg');

INSERT INTO products (name, description, price, image)
VALUES ('Sleep Aid Restorer', 'Promotes deep, restful sleep and muscle recovery', 32.99, 'sleep_aid_restorer.jpg');


