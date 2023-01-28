import React from 'react';
import { Container, Row, Col, Button,Card } from 'react-bootstrap';



// images
import backImg from '../../assets/images/covers/pattern.png';
import verticalImg from '../../assets/images/layouts/vertical-full-sm.png';

const Hero = () => {
    return (
            <Container>
                <Row className="align-items-center">
                    <Col>
                    <Card style={{ width: '18rem' }}>
                        <Card.Img src="https://ath2.unileverservices.com/wp-content/uploads/sites/2/2017/03/barbeiro-ruim-724x439.jpg" />
                        <Card.ImgOverlay>
                            <Card.Title >Agendar</Card.Title>
                            <Card.Text>
                            Some quick example text to build on the card title and make up the
                            bulk of the card's content.
                            </Card.Text>
                        </Card.ImgOverlay>
                    </Card>
                    </Col>
                    <Col className="text-center">
                    <Card style={{ width: '18rem' }}>
                        <Card.Img variant="top" src="holder.js/100px180" />
                        <Card.Body>
                            <Card.Title>Localização</Card.Title>
                            <Card.Text>
                            Some quick example text to build on the card title and make up the
                            bulk of the card's content.
                            </Card.Text>
                            <Button variant="primary">Go somewhere</Button>
                        </Card.Body>
                    </Card>
                    </Col>
                    <Col className="text-center">
                    <Card style={{ width: '18rem' }}>
                        <Card.Img variant="top" src="holder.js/100px180" />
                        <Card.Body>
                            <Card.Title>Serviços</Card.Title>
                            <Card.Text>
                            Some quick example text to build on the card title and make up the
                            bulk of the card's content.
                            </Card.Text>
                            <Button variant="primary">Go somewhere</Button>
                        </Card.Body>
                    </Card>
                    </Col>
                    <Col className="text-center">
                    <Card style={{ width: '18rem' }}>
                        <Card.Img variant="top" src="holder.js/100px180" />
                        <Card.Body>
                            <Card.Title>Meus Horários</Card.Title>
                            <Card.Text>
                            Some quick example text to build on the card title and make up the
                            bulk of the card's content.
                            </Card.Text>
                            <Button variant="primary">Go somewhere</Button>
                        </Card.Body>
                    </Card>
                    </Col>
                </Row>
                <Row>
                    <Col>
                        
                    </Col>
                </Row>
            </Container>
    );
};

export default Hero;
